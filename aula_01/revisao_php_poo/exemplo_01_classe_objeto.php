<?php

class Pessoa
{
    public string $nome;
	public int $idade;
	public float $peso;
	public float $altura;
}

$obj = new Pessoa;
$obj->nome = "João";
$obj->idade = 35;

echo "<pre>";
var_dump($obj);
echo "</pre>";