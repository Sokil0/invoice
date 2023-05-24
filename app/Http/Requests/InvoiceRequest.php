<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        // it`s not a good validation for credit card, need to write some custom rules or use some package
        return [
            'user' => 'required',
            'service' => 'required|string|min:1|max:255',
            'price' => 'required|numeric',
            'card' => 'required',
            'card.number' => 'required|string|min:1|max:255',
            'card.expired_date' => 'required|string',
            'card.cvv' => 'required|numeric',
            'card.full_name' => 'required|string|min:1|max:255',
        ];
    }
}
