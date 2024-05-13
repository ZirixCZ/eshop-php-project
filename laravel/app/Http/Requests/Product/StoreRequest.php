<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            "name" => "required|min:1|max:200",
            "desc" => "required|min:1|max:200",
            "price" => "required|min:1|max:200",
            "category_id" => "required|integer",
            "img_url" => "required|min:1|max:200",
        ];
    }
}
