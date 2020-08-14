<?php

namespace App\Http\Controllers\Employees;

use App\Employee;
use App\Http\Requests\Employees\StoreEmployeeRequest;
use App\Http\Requests\Employees\UpdateEmployeeRequest;
use App\Position;
use App\Services\GlobalServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (\request()->ajax()) {
            $model = Employee::query();

            return DataTables::of($model)->addColumn('photo', function ($data) {
                $avatar = null;
                if($data->photo) $avatar = view('components.avatar', compact('data'));
                return $avatar;
            })->addColumn('action', function ($data) {
                $route = 'employees';
                $button = view('components.action_button', compact('route', 'data'))->render();
                return $button;
            })->addColumn('position_name', function ($data) {
                $position_name = $data->position->name;
                return $position_name;
            })->editColumn('date', function ($data) {
                $date = Carbon::parse($data->date)->format('d.m.Y');
                return $date;
            })->rawColumns(['action', 'photo'])->make(true);
        }
        return view('employees.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $positions = Position::pluck('name', 'id');
        //$employees = $this->arr_employees();

        return view('employees.create', compact('positions'));
    }

    /**
     * @param StoreEmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();

        $validated['date'] = Carbon::parse($validated['date']);
        if (isset($validated['photo'])) $validated['photo'] = GlobalServices::saveImg($validated['photo'], 'employees');
        $validated['created_user_id'] = Auth::user()->id;
        $validated['updated_user_id'] = Auth::user()->id;

        Employee::create($validated);

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Employee $employee)
    {
        $modelValues = $employee->toArray();
        $modelValues['date'] = Carbon::parse($employee->date)->format('d.m.Y');

        $positions = Position::pluck('name', 'id');
        //$employees = $this->arr_employees();

        return view('employees.edit', compact('positions', 'employee', 'modelValues'));
    }

    /**
     * @param UpdateEmployeeRequest $request
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $validated = $request->validated();
        $validated['date'] = Carbon::parse($validated['date']);
        $validated['updated_user_id'] = Auth::user()->id;

        if (array_key_exists('photo', $validated)) {
            GlobalServices::deleteFile($employee->photo);
            $validated['photo'] = GlobalServices::saveImg($validated['photo'], 'employees');
        } else if (array_key_exists('delete_photo', $validated)) {
            GlobalServices::deleteFile($employee->photo);
            $validated['photo'] = null;
        }

        $employee->update($validated);

        return redirect()->route('employees.index');
    }

    /**
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Employee $employee)
    {
        $new_head = Employee::whereNotIn('id', [$employee->id])->get()->random();
        GlobalServices::deleteFile($employee->photo);

        foreach ($employee->subordinates as $subordinate) {
            $subordinate->update(['head_id' => $new_head->id]);
        }
        //dd($employee->subordinates);
        $employee->delete();

        return redirect()->route('employees.index');
    }

    public function arr_employees()
    {
        $employees = Employee::with('position')->get();
        $arr_employees = [];

        foreach ($employees as $employee) {
            $arr_employees[$employee->position->name][$employee->id] = $employee->name;

        }
        //dd($arr_employees);
        return $arr_employees;
    }

    public function getEmployees()
    {
        $employees = Employee::where('name', 'LIKE',  '%' . \request("term"). '%')->select(['id', 'name'])->orderBy('name')->take(25)->get();
//dd($employees);
//        $view = null;
//        if (!empty($employees)) $view = view('components.select', compact('employees'))->render();

        return response()->json($employees);
    }
}
