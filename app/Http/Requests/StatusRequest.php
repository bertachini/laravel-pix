<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StatusRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
        ];

        if ($this->isMethod('PATCH')) {
            $statusId = $this->route('id');
            $rules['name'][] = Rule::unique('transaction_statuses')->ignore($statusId);
        } else {
            $rules['name'][] = 'unique:transaction_statuses';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres.',
            'name.unique' => 'O nome do status já está em uso.',
        ];
    }
}
