<?php 
spl_autoload_register(function ($class_name){
	$path = implode("/",explode("\\",$class_name)); //Unix
	require_once "$path.php";
});

use classes\Atleta;
use classes\logs\Relatorio as Log;

$jogador = new Atleta("Walter", 1.83,80);

$jogador->calcIMC();
$jogador->showIMC();

Log::log($jogador);

echo $jogador;