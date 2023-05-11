<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'  => 'nullable|max:255',
            'last_name'   => 'required|max:255',
            'username'    => 'nullable|max:255',
            'email'       => 'required|email|unique:table,column,except,id|max:255',
            'bio'         => 'nullable|max:255',
            'description' => 'nullable',
            'password'    => 'required|max:30|confirmed',
        ];
    }
}
