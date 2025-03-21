<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user()->id)],
            'age' => ['required', 'integer', 'min:15'],
            'contact' => ['nullable', 'numeric'],
            'limit' => ['required', 'numeric', 'min:0'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        ];
    }
}
