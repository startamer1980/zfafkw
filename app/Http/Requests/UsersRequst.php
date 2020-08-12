<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequst extends FormRequest
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
                'name' => 'required|string|max:50|min:3',
                'email' => 'required|email|unique:users,email,'.$this->id,
                'password'  => 'required_without:id'
            ];
        }

    public function messages()
    {
        return [
            'name.required'                 => 'الاسم مطلوب ',
            'name.string'                   => 'الاسم يجب ان يكون احرف',
            'name.max'                      => 'الاسم يجب ان لا تزيد عدد الحروف عن 50 حروف',
            'name.min'                      => 'الاسم يجب أن لا تقل عددالحروف عن 3 حروف',
            'email.required'                => 'الايميل يجب ان يتم ادخاله',
            'email.email'                   => 'صيغة الايميل غير صحيحه',
            'email.unique'                  => 'هذه الايميل موجود بالفعل',
            'password.required_without'     =>  'يجب ادخال كلمة السر',
        ];
    }
}
