<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AuthRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'senha' => 'required|min:6|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um endereço de email válido',
            'email.unique' => 'Este email já está cadastrado',
            'senha.required' => 'O campo senha é obrigatório',
            'senha.min' => 'O campo senha deve ter no mínimo 6 caracteres',
            'senha.max' => 'O campo senha deve ter no máximo 255 caracteres'
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
