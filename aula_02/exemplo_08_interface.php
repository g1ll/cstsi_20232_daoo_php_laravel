<?php 
include 'autoload.php';

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