<?php 
require 'classes/Pessoa.php';

$pessoaUm = new Pessoa('João',34, null, null);
$pessoaDois = new Pessoa('Maria',24, 60, 1.6);

var_dump($pessoaUm, $pessoaDois);
