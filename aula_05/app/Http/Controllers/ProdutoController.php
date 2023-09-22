<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProdutoController extends Controller
{

    public function index() : View {
        $model = new Produto();
        // dump($model->all());
        // // return response()->json($model->find(111));
        $collectionProdutos = Produto::all();
        return view('produtos',[
            'listProdutos'=>$collectionProdutos,
            'totalProds'=>$collectionProdutos->count()
        ]);
    }

    public function show($id) : View {
        // dump(Produto::find($id));
        return view('produto-show',[
            'produto'=>Produto::find($id)
        ]);
    }

    public function create(): View{
        return view('produto-create');
    }

    public function store(Request $request) {
        $newProduto = $request->all();//array associativo
        $newProduto['importado'] = $request->has('importado');
        // dd($newProduto);
        if(!Produto::create($newProduto))
            dd("Erro ao inserir o novo produto!!!");

        return redirect('/produtos');
    }

    public function edit($id): View{
        $produto = Produto::find($id);
        if(!$produto)
            dd("Produto não encontrado");
        return view('produto-edit',[
            'produto'=>$produto
        ]);
    }

    public function update(Request $request, $id){
        $updatedProduto = $request->all();//array assoc
        $updatedProduto['importado'] = $request->has('importado');

        if(!Produto::find($id)->update($updatedProduto))
            dd("Erro ao atualizar produto $id!!!");

        return redirect('/produtos');
    }

}
