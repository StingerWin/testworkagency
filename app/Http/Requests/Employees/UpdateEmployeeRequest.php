<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends StoreEmployeeRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $employee = $this->route('employee');
        $validationArray = [
            'email' => [
                'email',
                'required',
            ],

            'delete_photo' => [],
        ];

        $mergedArray = array_merge(parent::rules(), $validationArray);

        return $mergedArray;
    }
}
