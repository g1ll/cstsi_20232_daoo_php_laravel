<?php 
spl_autoload_register(function ($class_name){
	$path = implode("/",explode("\\",$class_name)); //Unix
	require_once "$path.php";
});

use classes\Atleta;
use classes\Medico;

$jogador = new Atleta("Walter",1.83);
$medico = new Medico("Pualo Paixão",122343,"Fisioterapeuta");