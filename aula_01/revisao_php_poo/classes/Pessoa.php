<?php

class Pessoa
{
    public string $nome;
    public int $idade;
    private float | null $peso;
    public float | null $altura;
    private float | null $imc;

    public function __construct($nome, $idade, $peso=null, $altura=null)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function __destruct()
    {
        echo "\n$this->nome foi destruído!!!";
    }

    public function calcIMC(): void
    {
		echo "\nIMC $this->nome: ";
        if(isset($this->peso)&&isset($this->altura)) {
            $this->imc = $this->peso/$this->altura**2;
			echo number_format($this->imc,2);
        } else {
            echo " Erro, defina peso e altura primeiro!";;
        }
    }

    function __get($name){
        echo "\nRetornando o $name do $this->nome...";
        return $this->$name;
    }

    function __set($name,$value){
        echo "\nAlterando $name do $this->nome...\n";
        $this->$name=$value;
    }
}
