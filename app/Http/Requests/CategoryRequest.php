<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'image' => 'required_without:id|mimes:jpg,jpeg,png,PNG',
            'sort' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required_without' => 'هذا الحقل مطلوب في حالة الاضافه',
            'required' => 'هذا الحقل مطلوب ',
            'string' => 'هذا الحقل يجب ان يكون احرف',
            'max' => 'هذا الحقل يجب ان لا تزيد عدد الحروف عن 50 حرف',
        ];
    }
}
