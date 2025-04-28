<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'company_name' => 'required|string|max:255',
            'cnpj' => [
                'required',
                'string',
                'unique:partner_companies,cnpj',
                $this->cnpjValidator(),
            ],
            'phone' => 'required|string|regex:/^[0-9]{10,11}$/',
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:partner_companies,email',
            ],
        ];

        if ($this->isMethod('PATCH')) {
            $companyId = $this->route('id');
            $rules['cnpj'][3] = Rule::unique('partner_companies', 'cnpj')->ignore($companyId);
            $rules['email'][3] = Rule::unique('partner_companies', 'email')->ignore($companyId);
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'company_name.required' => 'O nome da empresa é obrigatório.',
            'company_name.string' => 'O nome da empresa deve ser uma string.',
            'company_name.max' => 'O nome da empresa deve ter no máximo 255 caracteres.',

            'cnpj.required' => 'O CNPJ é obrigatório.',
            'cnpj.string' => 'O CNPJ deve ser uma string.',
            'cnpj.size' => 'O CNPJ deve conter exatamente 14 dígitos.',
            'cnpj.cnpj_validator' => 'O CNPJ é inválido.',
            'cnpj.unique' => 'O CNPJ já está em uso.',

            'phone.required' => 'O telefone é obrigatório.',
            'phone.string' => 'O telefone deve ser uma string.',
            'phone.regex' => 'O telefone deve conter 10 ou 11 dígitos.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'email.max' => 'O e-mail deve ter no máximo 255 caracteres.',
            'email.unique' => 'O e-mail já está em uso.',
        ];
    }

    protected function cnpjValidator()
    {
        return function ($attribute, $value, $fail) {
            $cnpj = preg_replace('/\D/', '', $value);

            if (strlen($cnpj) !== 14) {
                $fail('O CNPJ deve conter exatamente 14 dígitos.');

                return;
            }

            if (preg_match('/(\d)\1{13}/', $cnpj)) {
                $fail('O CNPJ é inválido.');

                return;
            }

            $weights1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
            $sum = 0;
            for ($i = 0; $i < 12; $i++) {
                $sum += $cnpj[$i] * $weights1[$i];
            }
            $remainder = $sum % 11;
            $digit1 = ($remainder < 2) ? 0 : 11 - $remainder;

            if ($cnpj[12] != $digit1) {
                $fail('O CNPJ é inválido.');

                return;
            }

            $weights2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
            $sum = 0;
            for ($i = 0; $i < 13; $i++) {
                $sum += $cnpj[$i] * $weights2[$i];
            }
            $remainder = $sum % 11;
            $digit2 = ($remainder < 2) ? 0 : 11 - $remainder;

            if ($cnpj[13] != $digit2) {
                $fail('O CNPJ é inválido.');

                return;
            }
        };
    }
}
