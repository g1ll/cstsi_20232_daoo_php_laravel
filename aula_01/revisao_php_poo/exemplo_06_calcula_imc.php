<?php 
require 'classes/Pessoa.php';

$pessoaUm = new Pessoa('João',34);
$pessoaDois = new Pessoa('Maria',24, 60, 1.6);

$pessoaUm->calcIMC();
$pessoaDois->calcIMC();
