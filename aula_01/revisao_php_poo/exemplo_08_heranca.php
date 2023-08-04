<?php 

require 'classes/Pessoa.php';
require 'classes/Paciente.php';

$pa1 = new Paciente("Luizinho",1.8,80);

$pa1->calcIMC();
echo $pa1->showIMC();