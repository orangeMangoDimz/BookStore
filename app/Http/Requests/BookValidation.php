<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookValidation extends FormRequest
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
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'bookTitle' => ['required'],
            'description' => ['required'],
            'publisher_id' => ['required', 'exists:publishers,id'],
            'price' => ['required', 'integer'],
            'releaseDate' => ['required', 'date']
        ];
    }
}
