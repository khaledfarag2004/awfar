<?php

namespace App\Http\Requests\Dashboard\Users;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:150',
            'password'  => 'nullable|string|min:6',
            'is_active' => 'required|boolean',
            'city_id' => 'required|exists:cities,id',
            'type' => 'required|string',
            'phone'    => 'required|regex:/^5[0-9]{8}$/',
            'is_blocked' => 'required|boolean',
        ];
    }
}
