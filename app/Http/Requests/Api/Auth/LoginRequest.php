<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'phone' => 'required|regex:/^5[0-9]{8}$/',
            'password' => 'required|string|min:6',
        ];
    }
    public function messages(): array{
        return [
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.regex' => 'رقم الهاتف خطا',
            'password.required' => 'كلمة المرور مطلوبه',
            'password.min' => 'كلمة المرور اقل من 6 ارقام',

        ];
    }
}
