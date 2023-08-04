<?php
class Pessoa
{
    public string $nome;
	public int $idade;
	public float | null $peso;
	public float | null $altura;
	private float | null $imc;

	function __construct($nome, $idade, $peso=null, $altura=null)
	{
			$this->nome = $nome;
			$this->idade = $idade;
			$this->peso = $peso;
			$this->altura = $altura;
	}

	function __destruct()
	{
		echo "\n$this->nome foi destruído!!!";
	}
}