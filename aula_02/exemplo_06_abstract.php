<?php 
spl_autoload_register(function ($class_name){
	$path = implode("/",explode("\\",$class_name)); //Unix
	require_once "$path.php";
});

use classes\Atleta;
use classes\logs\Relatorio as Log;
use classes\Medico;

$jogador = new Atleta("Walter", 1.83,80);
$medico = new Medico("Pacheco",122343,"Fisioterapeuta");


$jogador->calcIMC();
$jogador->showIMC();

echo $jogador;
echo $medico;