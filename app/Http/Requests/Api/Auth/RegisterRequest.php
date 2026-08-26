<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone'    => 'required|unique:users|regex:/^5[0-9]{8}$/',
            'password' => 'required|min:6',
            'name'     => 'required|string|max:255',
            'email'    => 'nullable|unique:users|email',
            'city_id'  => ['required', 'exists:cities,id'],
        ];
    }

    /**
     * Custom validation messages in Arabic
     */
    public function messages(): array
    {
        return [
            'phone.required' => 'رقم الهاتف مطلوب.',
            'phone.unique'   => 'رقم الهاتف مستخدم بالفعل.',
            'phone.regex'    => 'رقم الهاتف يجب أن يبدأ بالرقم 5 ويتكون من 9 أرقام.',

            'password.required'  => 'كلمة المرور مطلوبة.',
            'password.min'       => 'كلمة المرور يجب أن تحتوي على 6 أحرف على الأقل.',
            'password.confirmed' => 'تأكيد كلمة المرور غير مطابق.',

            'name.required' => 'الاسم مطلوب.',
            'name.string'   => 'الاسم يجب أن يكون نص.',
            'name.max'      => 'الاسم يجب ألا يزيد عن 255 حرف.',

            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل.',
            'email.email'  => 'البريد الإلكتروني غير صالح.',
            'email.nullable' => 'البريد الإلكتروني اختياري.',

            'city_id.required' => 'المدينة مطلوبة.',
            'city_id.exists'   => 'المدينة المختارة غير موجودة.',
        ];
    }
}
