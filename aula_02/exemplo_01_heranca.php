<?php  

// require "classes/Pessoa.php";
require "classes/Atleta.php";

$jogador = new Atleta("Walter", 1.83,80);

$jogador->calcIMC();
$jogador->showIMC();