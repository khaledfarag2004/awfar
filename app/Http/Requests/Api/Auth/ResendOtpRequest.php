<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ResendOtpRequest extends FormRequest
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
        ];
    }
    public function messages(): array{
        return [
            'phone.regex'    => 'رقم الهاتف يجب أن يبدأ بالرقم 5 ويتكون من 9 أرقام.',
            'phone.required' => 'رقم الهاتف مطلوب.',
        ];
    }
}
