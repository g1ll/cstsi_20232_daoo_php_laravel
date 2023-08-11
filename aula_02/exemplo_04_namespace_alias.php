<?php 

spl_autoload_register(function ($class_name){
	// echo $class_name;
	// die;
	// $path = $class_name;
	$path = implode("/",explode("\\",$class_name)); //Unix
	require_once "$path.php";
});

use classes\Atleta;
use classes\logs\Relatorio;

$jogador = new Atleta("Walter", 1.83,80);

$jogador->calcIMC();
$jogador->showIMC();

Relatorio::log($jogador);