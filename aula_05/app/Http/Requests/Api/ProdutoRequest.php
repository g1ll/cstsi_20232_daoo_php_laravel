<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            "nome" => "required | max: 10",
            "importado" => "nullable | boolean",
            "qtd_estoque" => "required | numeric | min:2",
            "descricao" => "required | max:500",
            "preco" => "required | numeric | min: 1.99",
            "fornecedor_id" => "required | exists:fornecedores,id"
        ];
    }

    public function messages():array{
        return [
            "fornecedor_id.required"=>"Fornecedor é obrigatório!",
            "fornecedor_id.exists"=>"Fornecedor não encontrado!",
        ];
    }
}
