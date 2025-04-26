<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'payment_amount' => [
                'required',
                'numeric',
                'gt:' . $this->route('order')->total,
            ],
        ];
    }

    public function messages()
    {
        return [
            'payment_amount.gt' => 'Payment amount must be greater than grand total',
        ];
    }
}
