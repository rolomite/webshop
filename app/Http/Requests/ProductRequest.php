<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if ($this->method() == 'PATCH') {
            return [
                'published_at' => ['required', 'in:published,draft'],
            ];
        }
        return [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string', 'max:255'],
            'images' => ['array', 'max:4'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'old_images.*' => ['sometimes', 'url'],
            'published_at' => ['required', 'in:published,draft'],
        ];
    }
}
