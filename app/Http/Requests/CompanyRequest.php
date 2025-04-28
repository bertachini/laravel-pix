<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:255',
            'cnpj' => 'required|string|max:14',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'company_name.required' => 'O nome da empresa é obrigatório.',
            'cnpj.required' => 'O CNPJ é obrigatório.',
            'phone.required' => 'O telefone é obrigatório.',
            'email.required' => 'O email é obrigatório.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $notify = collect($validator->errors()->all())
            ->map(fn($msg) => [
                'type' => 'warning',
                'message' => $msg
            ])
            ->all();


        throw new HttpResponseException(
            redirect()
                ->back()
                ->withInput()
                ->withErrors($validator)
                ->with('notify', $notify)
        );
    }

}
