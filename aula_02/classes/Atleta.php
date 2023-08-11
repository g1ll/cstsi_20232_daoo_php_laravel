<?php

// require_once "classes/Pessoa.php";

namespace classes;

use classes\Abstracts\Pessoa as PessoaAbstrata;
use traits\IMC;

class Atleta extends PessoaAbstrata
{
	use IMC;

    public function __construct($nome, $altura, $peso=null, $idade=null)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->peso = $peso;
        $this->altura = $altura;
        $this->calcIMC();
    }

    public function __toString(): string
    {
		$class_name = self::class;
        return "\n===Dados da $class_name==="
               ."\nNome: $this->nome"
               .($this->idade ? "\nIdade: $this->idade" : "")
               ."\nPessoa: $this->peso"
               ."\nAltura: $this->altura"
           		."\nIMC: ".number_format($this->imc, 3);
    }
}
