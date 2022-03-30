<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:50'],
            'is_active' => ['required', 'boolean'],
            'category_id' => ['required', 'exists:App\Models\Products\Category,id'],
            'description' => 'required',
            'product_brand' => ['required', 'max:50'],
            'product_rating' => ['required', 'integer', 'min:1', 'max:5'],
            'SKU' => ['required', 'integer', 'unique:products,SKU,'.request('id')],
            'price' => ['required', 'numeric'],
        ];
    }
}
