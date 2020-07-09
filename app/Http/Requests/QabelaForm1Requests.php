<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QabelaForm1Requests extends FormRequest
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
            'title' => 'required|string|max:150|min:3',
            'description' => 'required|string',
            'image'  => 'required_without:id|mimes:jpg,jpeg,png,PNG',
            'user_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'image.required_without' => 'هذا الحقل مطلوب في حالة الاضافه',
            'required' => 'هذا الحقل مطلوب ',
            'user_id.required' => 'رقم المستخدم  مطلوب ',
            'description.string' => 'هذا الحقل يجب ان يكون احرف',
            'title.string' => 'هذا الحقل يجب ان يكون احرف',
            'title.max' => 'هذا الحقل يجب ان لا تزيد عدد الحروف عن 150 حروف',
            'title.min' => 'هذا الحقل يجب أن لا تقل عددالحروف عن 3 حروف',
        ];
    }
}
