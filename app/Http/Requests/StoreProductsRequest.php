<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'products' => 'required|array',
            'products.*.code' => 'required|string',
            'products.*.product' => 'required|string',
            'products.*.description' => 'required|string',
            'products.*.unit' => 'required|string',
            'products.*.status' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'products.required' => 'The products field is required.',
            'products.array' => 'The products field must be an array.',

            'products.*.code.required' => 'The code for each product is required.',
            'products.*.code.string' => 'The code for each product must be a string.',
            
            'products.*.product.required' => 'The product name for each product is required.',
            'products.*.product.string' => 'The product name for each product must be a string.',
            
            'products.*.description.required' => 'The description for each product is required.',
            'products.*.description.string' => 'The description for each product must be a string.',
            
            'products.*.unit.required' => 'The unit for each product is required.',
            'products.*.unit.string' => 'The unit for each product must be a string.',
            
            'products.*.status.required' => 'The status for each product is required.',
            'products.*.status.boolean' => 'The status for each product must be true or false.',
        ];
    }
}
