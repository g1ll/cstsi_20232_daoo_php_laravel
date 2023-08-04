<?php

class Pessoa
{
    public string $nome;
	public int $idade;
	public float $peso;
	public float $altura;
}

$pessoaUm = new Pessoa;
$pessoaUm->nome = "João";
$pessoaUm->idade = 34;

$pessoaDois = new Pessoa;
$pessoaDois->nome = "Maria";
$pessoaDois->peso = 60;
$pessoaDois->altura = 1.6;


var_dump($pessoaUm,$pessoaDois);