<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => ['required_if:_method,PATCH', 'date'],
            'partner_company_id' => ['required', 'uuid', Rule::exists('partner_companies', 'id')],
            'client_id' => ['required', 'integer', Rule::exists('clients', 'id')],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'transaction_status_id' => ['required_if:_method,PATCH', 'uuid', Rule::exists('transaction_statuses', 'id')],
        ];
    }

    public function messages(): array
    {
        return [
            'date.required_if' => 'O campo data é obrigatório.',
            'date.date' => 'O campo data deve ser uma data válida.',
            'partner_company_id.required' => 'O campo empresa parceira é obrigatório.',
            'partner_company_id.uuid' => 'O campo empresa parceira deve ser um UUID válido.',
            'partner_company_id.exists' => 'A empresa parceira selecionada não existe.',
            'client_id.required' => 'O campo cliente é obrigatório.',
            'client_id.uuid' => 'O campo cliente deve ser um UUID válido.',
            'client_id.exists' => 'O cliente selecionado não existe.',
            'amount.required' => 'O campo valor é obrigatório.',
            'amount.numeric' => 'O campo valor deve ser um número.',
            'amount.min' => 'O campo valor deve ser maior que 0.',
            'transaction_status_id.required_if' => 'O campo status é obrigatório.',
            'transaction_status_id.uuid' => 'O campo status deve ser um UUID válido.',
            'transaction_status_id.exists' => 'O status selecionado não existe.',
        ];
    }
}
