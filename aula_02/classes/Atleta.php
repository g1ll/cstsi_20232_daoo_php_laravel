<?php
// require_once "classes/Pessoa.php";
namespace classes;

class Atleta extends Pessoa{

	function __construct($nome, $altura, $peso)
	{
		parent::__construct($nome, null, $peso, $altura);
		$this->calcIMC();
	}

	public function __toString(): string
	{
		return parent::__toString()
			."\nIMC: ".number_format($this->imc,3);
	}
}