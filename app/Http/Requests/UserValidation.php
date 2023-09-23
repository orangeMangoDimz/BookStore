<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserValidation extends FormRequest
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
    protected $stopOnFirstFailure = true;
    public function rules(): array
    {
        return [
            'name' => [Rule::when(request()->routeIs('user.store'), 'required')],
            'email' => [
                'required', 'email',
                Rule::when(request()->routeIs('user.search'), 'exists:users,email')
            ],
            'password' => [
                'required', 'min:6',
                Rule::when(request()->routeIs('user.store'), 'confirmed')
            ],
            'terms' => [
                Rule::when(request()->routeIs('user.store'), 'accepted')
            ]
        ];
    }
}
