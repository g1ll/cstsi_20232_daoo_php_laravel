<?php 
namespace classes\logs;
use classes\Atleta as Jogador;

class Relatorio{
	public static function log(Jogador $jogador) : void {
		echo "\nlog:\n";
		var_dump($jogador);
	}
}