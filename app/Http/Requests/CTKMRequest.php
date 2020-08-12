<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CTKMRequest extends FormRequest
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
            'name' => 'required|min:10',
            'tungay' =>'required|date',
            'denngay' => 'required|date',
            'phantramKM' => "required | numeric | between:0,100",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Tên không được để trống",
            'name.min' => 'Tên ít nhất 10 ký tự',
            'tungay.required' => "Ngày bắt đầu không được để trống",
            'tungay.date' => "Ngày bắt đầu phải là ngày tháng",
            'denngay.required' => "Ngày bắt đầu không được để trống",
            'denngay.date' => "Ngày bắt đầu phải là ngày tháng",
            'phantramKM.required' => "Phần trăm KM không được để trống",
            'phantramKM.numeric' => 'Phần trăm KM phải là một số',
            'phantramKM.between' => 'Phần trăm KM phải nằm trong khoảng 0-100',
        ];
    }

}
