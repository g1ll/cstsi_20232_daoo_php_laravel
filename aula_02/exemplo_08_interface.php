<?php 
spl_autoload_register(function ($class_name){
	$path = implode("/",explode("\\",$class_name)); //Unix
	require_once "$path.php";
});

use classes\Atleta;
use classes\logs\Relatorio;
use classes\Medico;

$jogador = new Atleta("Walter", 1.83,80);
$medico = new Medico("Pualo Paixão",122343,"Fisioterapeuta");

$jogador->calcIMC();

$relatorio = new Relatorio;
$relatorio->add($medico);
$relatorio->add($jogador);
$relatorio->imprime();