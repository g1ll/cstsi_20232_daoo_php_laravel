<?php
// require_once "classes/Pessoa.php";
namespace classes;

class Atleta extends Pessoa{

	function __construct($nome, $altura, $peso)
	{
		parent::__construct($nome, null, $peso, $altura);
		$this->calcIMC();
	}
}