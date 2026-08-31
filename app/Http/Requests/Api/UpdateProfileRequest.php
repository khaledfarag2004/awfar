<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name'   => 'required|string|max:150|min:3',
            'phone'  => 'required|string|regex:/^5[0-9]{8}$/',
            'email'  => 'nullable|string|email|max:255|unique:users,email,' . $this->user?->id,
            'city_id'=> 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'الاسم مطلوب.',
            'name.string'   => 'الاسم يجب أن يكون نص.',
            'name.max'      => 'الاسم يجب ألا يزيد عن 150 حرف.',
            'name.min'      => 'الاسم يجب ألا يقل عن 3 أحرف.',

            'phone.required' => 'رقم الهاتف مطلوب.',
            'phone.string'   => 'رقم الهاتف يجب أن يكون نص.',
            'phone.regex'    => 'رقم الهاتف يجب أن يبدأ بالرقم 5 ويتكون من 9 أرقام.',

            'email.string'   => 'البريد الإلكتروني يجب أن يكون نص.',
            'email.email'    => 'البريد الإلكتروني غير صالح.',
            'email.max'      => 'البريد الإلكتروني يجب ألا يزيد عن 255 حرف.',
            'email.unique'   => 'البريد الإلكتروني مستخدم بالفعل.',

            'city_id.required' => 'المدينة مطلوبة.',
        ];
    }

}
