<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'nullable|string|max:100',
            'barcode' => 'required|string|max:20|unique:products,barcode',
            'unit_price' => 'required|numeric|min:0.00|max:999999.99',
            'quantity' => 'required|integer|min:0|max:10000',
        ];
    }
}
