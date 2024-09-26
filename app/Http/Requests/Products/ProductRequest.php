<?php

namespace App\Http\Requests\Products;

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
        return [
            'main_shop_id' => 'required|integer|exists:main_shops,id',
            'category_id' => 'required|integer|exists:categories,id',
            'inputs.*.name' => 'required|string|min:3|max:255',
            'inputs.*.image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'inputs.*.valyuta' => 'required|string|max:255',
            'inputs.*.price' => 'required|numeric',
            'inputs.*.count' => 'required|numeric'
        ];
    }
}
