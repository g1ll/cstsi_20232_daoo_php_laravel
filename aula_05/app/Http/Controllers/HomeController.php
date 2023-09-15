<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() : void {
        echo "HomeController: Olá Mundo !!";
        dd(["Teste"=>"Testando o DD!!!"]);
    }

    public function index2() : void {
        echo "HomeController DOIS: Olá Mundo II!!";
        dd(["Teste"=>"Rota alternativa!!!"]);
    }
}
