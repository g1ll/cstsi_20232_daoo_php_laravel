<?php

// require_once "classes/Pessoa.php";

namespace classes;

use classes\Abstracts\Pessoa as PessoaAbstrata;
use Exception;
use interfaces\IMC;

class Atleta extends PessoaAbstrata implements IMC
{

    private float | null $imc;

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

	public function calcIMC(): void
    {
		try {
			if(isset($this->peso)&&isset($this->altura)) {
				$this->imc = $this->peso/$this->altura**2;		
			} else{
				throw new Exception("Erro, defina peso e altura primeiro!");
			}
		} catch (Exception $error) {
			echo $error->getMessage();
			foreach($error->getTrace() as $trace) print_r($trace);
			throw $error;
		}
    }

    public function showIMC(): void {
        $msg = "\nIMC $this->nome: ";
        if(isset($this->imc))
            $msg.= number_format($this->imc,2);
        else
         $msg .= " Erro, calcule o imc primeiro";
        echo $msg;
    }
}
