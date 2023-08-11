<?php 
spl_autoload_register(function ($class_name){
	require_once "classes/$class_name.php";
});


$jogador = new Atleta("Walter", 1.83,80);

$jogador->calcIMC();
$jogador->showIMC();