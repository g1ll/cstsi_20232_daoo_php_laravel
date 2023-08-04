<?php

class Paciente extends Pessoa{

	function __construct($nome, $altura, $peso)
	{
		parent::__construct($nome, null, $peso, $altura);
	}
}