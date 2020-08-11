<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BanRequest extends FormRequest
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
            'name' => "required | regex:/^[0-9]*$/ | unique:bans,ma_ban",
            'soghe' => "required | integer | between:2,10",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Tên không được để trống",
            'name.regex' => 'Tên chỉ được dùng ký tự số',
            'name.unique' => 'Tên bàn đã tồn tại',
            'soghe.required' => "Số ghế không được để trống",
            'soghe.integer' => "Số ghế phải là một số dương",
            'soghe.between' => "Số ghế phải từ 2-10",
        ];
    }

}
