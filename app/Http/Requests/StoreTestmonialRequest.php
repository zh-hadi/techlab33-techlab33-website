<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestmonialRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'profession' => ['required', 'string'],
            'image' => ['nullable', 'image'],
            'comment' => ['required', 'string'],
            'rating' => ['nullable', 'numeric', 'between:1,5'],
            'status' => ['required', 'in:active,inactive'],
        ];
    }
}
