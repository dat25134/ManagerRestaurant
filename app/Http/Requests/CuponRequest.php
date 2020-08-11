<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuponRequest extends FormRequest
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
        return [
            'phantramKM' => "required | numeric | between:0,100",
        ];
    }

    public function messages()
    {
        return [
            'phantramKM.required' => "Phần trăm KM không được để trống",
            'phantramKM.numeric' => 'Phần trăm KM phải là một số',
            'phantramKM.between' => 'Phần trăm KM phải nằm trong khoảng 0-100',
        ];
    }
}
