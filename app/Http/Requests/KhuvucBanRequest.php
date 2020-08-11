<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhuvucBanRequest extends FormRequest
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
            'name' => "required | regex:/^[A-Z]{1}$/ | unique:khuvucs,Tenkhuvuc"
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Tên không được để trống",
            'name.regex' => 'Chỉ được một ký tự chữ cái in hoa',
            'name.unique' => 'Khu vực bị trùng',
        ];
    }

}
