<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProdutoController extends Controller
{

    public function index(): View {
        // $model = new Produto();
        // // dd($model->all());
        // // return response()->json($model->find(111));

        return view('produtos',[
            'listProdutos'=>Produto::all()
        ]);
    }

    public function show($id) : View {
        // dump(Produto::find($id));
        return view('produto-show',[
            'produto'=>Produto::find($id)
        ]);
    }
}
