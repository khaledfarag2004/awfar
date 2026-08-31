<?php

namespace App\Http\Requests\Dashboard\Users;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'      => 'required|string|max:150',
            'email'     => 'required|string|email|max:150|unique:users',
            'password'  => 'required|string|min:6',
            'is_active' => 'required|boolean',
            'city_id'   => 'required|exists:cities,id',
            'type'      => 'required|string',
            'phone'     => 'required|unique:users|regex:/^5[0-9]{8}$/',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'الاسم مطلوب.',
            'name.string'       => 'الاسم يجب أن يكون نص.',
            'name.max'          => 'الاسم يجب ألا يزيد عن 150 حرف.',

            'email.required'    => 'البريد الإلكتروني مطلوب.',
            'email.string'      => 'البريد الإلكتروني يجب أن يكون نص.',
            'email.email'       => 'البريد الإلكتروني غير صالح.',
            'email.max'         => 'البريد الإلكتروني يجب ألا يزيد عن 150 حرف.',
            'email.unique'      => 'البريد الإلكتروني مستخدم بالفعل.',

            'password.required' => 'كلمة المرور مطلوبة.',
            'password.string'   => 'كلمة المرور يجب أن تكون نص.',
            'password.min'      => 'كلمة المرور يجب ألا تقل عن 6 أحرف.',

            'is_active.required'=> 'الحالة مطلوبة.',
            'is_active.boolean' => 'الحالة يجب أن تكون صحيحة أو خطأ.',

            'city_id.required'  => 'المدينة مطلوبة.',
            'city_id.exists'    => 'المدينة المختارة غير موجودة.',

            'type.required'     => 'النوع مطلوب.',
            'type.string'       => 'النوع يجب أن يكون نصاً.',

            'phone.required'    => 'رقم الهاتف مطلوب.',
            'phone.unique'      => 'رقم الهاتف مستخدم بالفعل.',
            'phone.regex'       => 'رقم الهاتف يجب أن يبدأ بالرقم 5 ويتكون من 9 أرقام.',
        ];
    }

}
