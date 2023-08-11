<?php

namespace classes\Abstracts;

abstract class Pessoa
{
    public string $nome;
    public int | null $idade;
    protected float | null $peso;
    public float | null $altura;
    protected float | null $imc;

    abstract public function __toString(): string;

    public function __destruct()
    {
        echo "\n$this->nome foi destruído!!!";
    }

    public function calcIMC(): void
    {
        if(isset($this->peso)&&isset($this->altura)) {
            $this->imc = $this->peso/$this->altura**2;
        } else {
            echo "Erro, defina peso e altura primeiro!";
        }
    }

    public function showIMC(): void
    {
        $msg = "\nIMC $this->nome: ";
        if(isset($this->imc)) {
            $msg.= number_format($this->imc, 2);
        } else {
            $msg .= " Erro, calcule o imc primeiro";
        }
        echo $msg;
    }

}
