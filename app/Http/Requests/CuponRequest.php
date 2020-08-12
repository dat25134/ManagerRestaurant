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
            'tenmon' => 'required|unique:ctkhuyenmais,id_mons'
        ];
    }

    public function messages()
    {
        return [
            'tenmon.required' => 'Tên món không được để trống',
            'tenmon.unique' => 'Món ăn đã nằm trong CTKM khác'
        ];
    }
}
