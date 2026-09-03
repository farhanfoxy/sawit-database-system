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
        'transaction_date' => [
            'required',
            'date',
        ],

        'factory_weight_ton' => [
            'required',
            'numeric',
            'min:0.001',
            'max:9999999.999',
        ],

        'normal_price_per_ton' => [
            'required',
            'numeric',
            'min:1',
        ],

        'has_bad_fruit' => [
            'sometimes',
            'boolean',
        ],

        'bad_fruit_ton' => [
            'exclude_unless:has_bad_fruit,1',
            'required',
            'numeric',
            'min:0.001',
            'lte:factory_weight_ton',
        ],

        'bad_fruit_price_per_ton' => [
            'exclude_unless:has_bad_fruit,1',
            'required',
            'numeric',
            'min:1',
        ],

        'transport_cost' => [
            'required',
            'numeric',
            'min:0',
        ],

        'weigh_ticket_number' => [
            'nullable',
            'string',
            'max:100',
        ],

        'payment_status' => [
            'required',
            'in:draft,paid',
        ],

        'notes' => [
            'nullable',
            'string',
            'max:2000',
        ],

        'weigh_ticket_files.*' => [
            'nullable',
            'file',
            'mimes:jpg,jpeg,png,pdf',
            'max:5120',
        ],

        'payment_proof_files.*' => [
            'nullable',
            'file',
            'mimes:jpg,jpeg,png,pdf',
            'max:5120',
        ],
    
        ];

    }
    public function messages(): array
    {
    return [
        'transaction_date.required' =>
            'Tanggal transaksi wajib diisi.',

        'transaction_date.date' =>
            'Format tanggal transaksi tidak valid.',

        'factory_weight_ton.required' =>
            'Tonase pabrik wajib diisi.',

        'factory_weight_ton.numeric' =>
            'Tonase pabrik harus berupa angka.',

        'factory_weight_ton.min' =>
            'Tonase pabrik harus lebih dari 0 ton.',

        'normal_price_per_ton.required' =>
            'Harga normal per ton wajib diisi.',

        'normal_price_per_ton.numeric' =>
            'Harga normal per ton harus berupa angka.',

        'normal_price_per_ton.min' =>
            'Harga normal per ton harus lebih dari Rp0.',

        'transport_cost.required' =>
            'Biaya transport wajib diisi.',

        'transport_cost.numeric' =>
            'Biaya transport harus berupa angka.',

        'transport_cost.min' =>
            'Biaya transport tidak boleh bernilai negatif.',

        'bad_fruit_ton.required_if' =>
            'Tonase sawit buruk wajib diisi jika terdapat sawit buruk.',

        'bad_fruit_ton.numeric' =>
            'Tonase sawit buruk harus berupa angka.',

        'bad_fruit_ton.min' =>
            'Tonase sawit buruk harus lebih dari 0 ton.',

        'bad_fruit_ton.lte' =>
            'Tonase sawit buruk tidak boleh melebihi total tonase pabrik.',

        'bad_fruit_price_per_ton.required_if' =>
            'Harga sawit buruk wajib diisi jika terdapat sawit buruk.',

        'bad_fruit_price_per_ton.numeric' =>
            'Harga sawit buruk harus berupa angka.',

        'bad_fruit_price_per_ton.min' =>
            'Harga sawit buruk harus lebih dari Rp0.',
        ];
    }
}
