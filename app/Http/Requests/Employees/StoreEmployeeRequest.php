<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
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

        $validationArray = [
            'photo' => [
                'mimetypes:image/jpg,image/png',
                'max:5000',
                'dimensions:min_width=300,min_height=300',
            ],
            'name' => [
                'required',
                'min:2',
                'max:256',
            ],
            'date' => [
                'date',
                'required',
            ],
            'phone_number' => [
                'required',
            ],
            'email' => [
                'email',
                'required',
            ],
            'salary' => [
                'numeric',
                'max:500',
                'required',
            ],
            'position_id' => [
                'numeric',
                Rule::exists('positions', 'id')->where(function ($query) {
                    return $query
                        ->where('id', request()->position_id);
                }),
            ],
            'head_id' => [
                'numeric',
                Rule::exists('employees', 'id')->where(function ($query) {
                    return $query
                        ->where('id', request()->head_id);
                }),
            ],
            'created_user_id' => [
                'numeric',
            ],
            'updated_user_id' => [
                'numeric',
            ],


        ];

        return $validationArray;
    }
}
