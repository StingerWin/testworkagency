<?php

namespace App\Http\Controllers\Positions;

use App\Employee;
use App\Http\Requests\Positions\StorePositionRequest;
use App\Position;
use App\Services\GlobalServices;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (\request()->ajax()) {
            $model = Position::query();

            return DataTables::of($model)->editColumn('updated_at', function ($data) {
                $updated_at = $data->updated_at->format('d.m.Y');
                return $updated_at;
            })->addColumn('action', function ($data) {
                $route = 'positions';
                $button = view('components.action_button', compact('route', 'data'))->render();
                return $button;
            })->make(true);
        }
        return view('positions.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePositionRequest $request)
    {
        $validated = $request->validated();

        $validated['created_user_id'] = Auth::user()->id;
        $validated['updated_user_id'] = Auth::user()->id;

        Position::create($validated);

        return redirect()->route('positions.index');
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
     * @param Position $position
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Position $position)
    {
        $modelValues = $position->toArray();
        $modelValues['updated_at'] = Carbon::parse($position->updated_at)->format('d.m.Y');

        return view('positions.edit', compact('position', 'modelValues'));
    }

    /**
     * @param StorePositionRequest $request
     * @param Position $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StorePositionRequest $request, Position $position)
    {
        $validated = $request->validated();
        $validated['updated_user_id'] = Auth::user()->id;

        $position->update($validated);

        return redirect()->route('positions.index');
    }

    /**
     * @param Position $position
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index');
    }
}
