<?php

namespace App\Http\Requests;

class UpdateTripRequest extends StoreTripRequest
{
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'change_reason' => ['required', 'string', 'min:5', 'max:500'],
        ]);
    }
}
