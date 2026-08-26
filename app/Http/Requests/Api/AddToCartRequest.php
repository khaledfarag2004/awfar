<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
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
            'product_id' => ['required', 'exists:products,id'],
            'quantity'   => ['required', 'integer', 'min:1'],
        ];
    }
    public function messages(): array
    {
        return [
            'product_id.required' => 'معرّف المنتج مطلوب.',
            'product_id.exists'   => 'المنتج غير موجود.',
            'quantity.required'   => 'الكمية مطلوبة.',
            'quantity.integer'    => 'الكمية لازم تكون رقم صحيح.',
            'quantity.min'        => 'الكمية لازم تكون على الأقل 1.',
        ];
    }
}
