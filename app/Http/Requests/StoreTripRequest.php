<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTripRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && ! auth()->user()->isOwner();
    }

    public function rules(): array
    {
        return [
            'transaction_date' => ['required', 'date'],
            'factory_weight_ton' => ['required', 'numeric', 'gt:0', 'max:9999999.999'],
            'normal_price_per_ton' => ['required', 'numeric', 'gt:0'],
            'has_bad_fruit' => ['nullable', 'boolean'],
            'bad_fruit_ton' => ['nullable', 'required_if:has_bad_fruit,1', 'numeric', 'gt:0', 'lte:factory_weight_ton'],
            'bad_fruit_price_per_ton' => ['nullable', 'required_if:has_bad_fruit,1', 'numeric', 'gt:0'],
            'transport_cost' => ['required', 'numeric', 'min:0'],
            'weigh_ticket_number' => ['nullable', 'string', 'max:100'],
            'payment_status' => ['required', 'in:draft,paid'],
            'notes' => ['nullable', 'string', 'max:2000'],
            'weigh_ticket_files.*' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'payment_proof_files.*' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['has_bad_fruit' => $this->boolean('has_bad_fruit')]);
    }
}
