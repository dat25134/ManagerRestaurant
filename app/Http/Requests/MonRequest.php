<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonRequest extends FormRequest
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
            'name' => "required|min:5|max:50",
            'gia' => 'required|numeric|min:1',
            'nhommons' => 'required',
            'donvitinhs' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Tên món không được để trống",
            'name.min' => 'Tên ít nhất 5 ký tự',
            'name.max' => 'Tên không được quá 50 ký tự',
            'gia.required' => 'Giá không được để trống',
            'gia.numeric' => 'Giá phải là một số',
            'gia.min' => 'Giá phải là số dương',
            'nhommons.required' => 'Nhóm món không được để trống',
            'donvitinhs.required' => 'Đơn vị tính không được để trống',

        ];
    }
}
