<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CTHDRequest extends FormRequest
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
            'soluong' => 'required | numeric | between:0,100'
        ];
    }

    public function messages()
    {
        return [
            'soluong.required' => 'Không được để trống SL',
            'soluong.numeric' => 'SL phải là số nguyên dương',
            'soluong.between' => 'SL trong khoảng từ 0-100',
        ];
    }
}
