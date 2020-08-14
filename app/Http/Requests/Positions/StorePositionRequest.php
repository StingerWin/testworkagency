<?php

namespace App\Http\Requests\Positions;

use Illuminate\Foundation\Http\FormRequest;

class StorePositionRequest extends FormRequest
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
            'name' => [
                'required',
                'max:256',
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
