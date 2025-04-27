<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'cpf' => ['required', 'string', 'max:14'],
            'phone' => 'required|string|max:15',
            'email' => ['required', 'string', 'email', 'max:255'],
            'city_id' => 'required|exists:cities,id',
        ];

        // For updates (PATCH requests), make password optional and adjust unique rules
        if ($this->isMethod('PATCH')) {
            $clientId = $this->route('id');
            $rules['password'] = 'nullable|string|min:8';
            $rules['email'][] = Rule::unique('clients')->ignore($clientId);
            $rules['cpf'][] = Rule::unique('clients')->ignore($clientId);
        } else {
            // For creates (POST requests), password is required and unique rules apply without ignore
            $rules['password'] = 'required|string|min:8';
            $rules['email'][] = 'unique:clients';
            $rules['cpf'][] = 'unique:clients';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.string' => 'O campo CPF deve ser uma string.',
            'cpf.max' => 'O campo CPF deve ter no máximo 14 caracteres.',
            'cpf.unique' => 'O CPF já está em uso.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'phone.string' => 'O campo telefone deve ser uma string.',
            'phone.max' => 'O campo telefone deve ter no máximo 15 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.string' => 'O campo e-mail deve ser uma string.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'email.max' => 'O campo e-mail deve ter no máximo 255 caracteres.',
            'email.unique' => 'O e-mail já está em uso.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'O campo senha deve ser uma string.',
            'password.min' => 'O campo senha deve ter no mínimo 8 caracteres.',
            'city_id.required' => 'O campo cidade é obrigatório.',
            'city_id.exists' => 'A cidade selecionada não é válida.',
        ];
    }
}
