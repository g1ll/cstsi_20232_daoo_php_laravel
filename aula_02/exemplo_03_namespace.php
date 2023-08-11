<?php 
spl_autoload_register(function ($class_name){
	$path = implode("/",explode("\\",$class_name));
	require_once "$path.php";
});

use classes\Atleta;

$jogador = new Atleta("Walter", 1.83,80);

$jogador->calcIMC();
$jogador->showIMC();