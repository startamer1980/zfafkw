<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequst;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use phpDocumentor\Reflection\Types\True_;
use PHPUnit\Framework\ExpectationFailedException;

class UsersController extends Controller
{
    use GeneralTrait;

    public function add(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rules(), $this->messages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            $errors = $messages->all();
            $message = $validator->errors()->first();
            return $this->returnError($message);
        }
        try {
            User::Create([
                'name' => $request->name,
                'password' => bcrypt($request->password),
                'email' => $request->email
            ]);
            return $this->returnSuccess("تم الاضافه بنجاح");
        } catch (\Exception $ex) {
            return $this->returnError($ex->getMessage());
        }
    }
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rulesLgin(), $this->messages());
        if ($validator->fails()) {
            $messages = $validator->messages();
            $errors = $messages->all();
            $message = $validator->errors()->first();
            return $this->returnError($message);
        }
        try {
            $credential = $request->only(['email', 'password']);
            $token = Auth::guard('user_api')->attempt($credential);
            if(!$token){
                return $this->returnError("بيانات الدخول غير صحيحه");
            }
            $user = Auth::guard('user_api')->User();
            $user->api_token = $token;
            return $this->returnData('user', $user, "تم تسجيل الدخول بنجاح");
        } catch (\Exception $ex) {

            return $this->returnError($ex->getMessage());
        }
    }

    public function update(Request $request)
    {

        try {
            $user = Auth::user();
            if(!$user){
                return $this->returnError("حدث خطأ حاول مره اخري, هذا العضو غير موجود");
            }
            $validator = Validator::make($request->all(), $this->rulesEdit($user->id), $this->messages());
            if ($validator->fails()) {
                $messages = $validator->messages();
                $errors = $messages->all();
                $message = $validator->errors()->first();
                return $this->returnError($message);
            }
            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            return $this->returnSuccess("تم تحديث البيانات بنجاح");
        } catch (\Exception $ex) {
            return $this->returnError($ex->getMessage());
        }
    }

    public function change_password(Request $request)
    {

        try {
            $user = Auth::user();
            if(!$user){
                return $this->returnError("حدث خطأ حاول مره اخري, هذا العضو غير موجود");
            }

            $user->update([
                'password' => bcrypt($request->password)
            ]);
            return $this->returnSuccess("تم تغيير كلمة السر بنجاح");
        } catch (\Exception $ex) {
            return $this->returnError($ex->getMessage());
        }
    }

    public function change_avatar(Request $request)
    {

        try {
            $user = Auth::user();
            if(!$user){
                return $this->returnError("حدث خطأ حاول مره اخري, هذا العضو غير موجود");
            }

            if($request->has('image')) {
                $filepath = uploadImage('users', $request->image);
                $user->update([
                    'image' => $filepath
                ]);
            }
            return $this->returnSuccess("تم رفع الصوره بنجاح");
        } catch (\Exception $ex) {
            return $this->returnError($ex->getMessage());
        }
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
            'email' => 'required|email|unique:users,email',
            'password'  => 'required|max:50|min:3'
        ];
    }
    public function rulesEdit(String $id)
    {
        return [
            'name' => 'required|string|max:50|min:3',
            'email' => 'required|email|unique:users,email,'.$id,
        ];
    }
    public function rulesLgin()
    {
        return [
            'password' => 'required|max:50|min:3',
            'email' => 'required|email',
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
            'password.required'             =>  'يجب ادخال كلمة السر',
            'password.max'                  => 'كلمة السر يجب ان لا تزيد عدد الحروف عن 50 حروف',
            'password.min'                  => 'كلمة السر يجب أن لا تقل عددالحروف عن 3 حروف',
        ];
    }
}
