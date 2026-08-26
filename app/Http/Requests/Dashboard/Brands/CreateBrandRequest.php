<?php

namespace App\Http\Requests\Dashboard\Brands;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use function Symfony\Component\Translation\t;

class CreateBrandRequest extends FormRequest
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
            'name'   => 'required|string|max:150|unique:brands,name',
            'logo'   => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|boolean',
        ];
    }
}
