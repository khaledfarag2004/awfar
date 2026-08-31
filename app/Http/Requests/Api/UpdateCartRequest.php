<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
{
    /**
     * تحديد إذا كان المستخدم مسموح له يعمل الطلب ده.
     */
    public function authorize(): bool
    {
        return true; // أي مستخدم يقدر يعدل الكمية
    }

    /**
     * القواعد الخاصة بالتحقق من البيانات.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'quantity' => ['required', 'integer', 'min:0'],
        ];
    }

    /**
     * رسائل الخطأ المخصصة بالعربي.
     */
    public function messages(): array
    {
        return [
            'quantity.required' => 'الكمية مطلوبة.',
            'quantity.integer'  => 'الكمية لازم تكون رقم صحيح.',
            'quantity.min'      => 'الكمية لازم تكون صفر أو أكبر.',
        ];
    }
}
