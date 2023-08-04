<?php 
require 'classes/Pessoa.php';

$pessoaUm = new Pessoa('João',34);
$pessoaDois = new Pessoa('Maria',24, 60, 1.6);

$pessoaUm->peso = 70;
$pessoaUm->altura = 1.7;

echo "\nPeso do $pessoaUm->nome é $pessoaUm->peso!\n";

$pessoaUm->calcIMC();
$pessoaDois->calcIMC();