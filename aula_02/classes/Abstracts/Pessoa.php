<?php

namespace classes\Abstracts;

abstract class Pessoa
{
    public string $nome;
    public int | null $idade;
    protected float | null $peso;
    public float | null $altura;

    abstract public function __toString(): string;

    public function __destruct()
    {
        echo "\n$this->nome foi destruído!!!";
    }

}
