<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class newPasswordRequest extends FormRequest
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
            'email' => [
        'required',
        'email',
        Rule::exists('users')->where(function ($query) {
            $query->where('role_id', 2);
        }),
    ],
    'password' => 'required|min:8|confirmed',
    'password_confirmation' => 'required',
        ];
    }
}
