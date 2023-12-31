<?php
namespace classes;
use classes\Abstracts\Pessoa as PessoaAbstrata;

class Medico extends PessoaAbstrata{

	private $CRM, $especialidade;

	public function __construct($nome, $crm,$especialidade,$idade=null)
	{
		$this->nome = $nome;
		$this->CRM = $crm;
		$this->especialidade = $especialidade;
		$this->idade = $idade;
	}

	public function getCRM(){
		return $this->CRM;
	}

	public function __toString()
	{
		$className = self::class;
		return 	"\n\n===Dados de $className ==="
			. "\nNome: $this->nome"
			. ($this->idade ? "\nIdade: $this->idade" : "")
			. "\nEspecialidade: $this->especialidade"
			. "\nCRM: $this->CRM\n";
	}
}