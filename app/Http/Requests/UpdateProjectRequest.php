<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'project_category_id' => ['nullable', 'exists:project_categories,id'],
            'name'          => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'client'        => 'nullable|string|max:255',
            'publish_date'  => 'nullable|date',
            'url'           => 'nullable|url|max:255',
            'images'        => 'nullable|array',
            'images.*'      => 'image|mimes:jpeg,png,jpg,gif,webp',
        ];
    }
}
