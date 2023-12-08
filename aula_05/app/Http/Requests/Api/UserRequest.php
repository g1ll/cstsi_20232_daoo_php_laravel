<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'      =>'required | string | max:50',
            'email'     =>'required | email | unique:users',
            'password'  =>'required | min:8'
        ];
    }

    public function messages(): array
    {
        return[
            'name.require'      => 'O nome é obrigatório!!',
            'name.max'          => 'O nome deve ter nomáximo 50 caracteres!',
            'email.require'     => 'O email é obrigatório!!',
            'email.email'       => 'Informe um email válido!',
            'email.unique'      => 'Email indiponível, cadastre outro email.',
            'password.min'      => 'A senha deve ter no mínimo oito caracteres!',
            'password.require'  => 'A senha é obrigatória!!'
        ];
    }
}
