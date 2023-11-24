<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request){
        $per_page=$request->query('per_page');
        $produtoPaginated = Produto::paginate($per_page);
        $produtoPaginated->appends([
            'per_page'=>$per_page
        ]);
        return response()->json($produtoPaginated);
    }

    public function show($id){
        try{
            return response()->json(Produto::findOrFail($id));
        }catch(Exception $error){
            $responseError = [
                'Error'=>"O produto de id $id não foi encontrado!!",
                'Exception'=> $error->getMessage(),
                // 'ExceptionTrace'=>$error->getTrace(),
            ];
            $statusHttp = 404;
            return response()->json($responseError,$statusHttp);
        }
    }

    public function store(Request $request){
        try{
            $request->validate([
                "nome" => "required | max: 10",
                "importado" => "nullable | boolean",
                "qtd_estoque" => "required | numeric | min:2",
                "descricao" => "required | max:500",
                "preco" => "required | numeric | min: 1.99",
                "fornecedor_id"=>"required | exists:fornecedores,id"
            ]);
            $newProduto = $request->all();
            $newProduto['importado'] = $request->has('importado');
            $storedProduto = Produto::create($newProduto);
            return response()->json([
                'msg'=>"Produto inserido!!!",
                'produto'=>$storedProduto
            ]);
        }catch(Exception $error){
            $responseError = [
                'Error'=>"Erro ao inserir o produto!!!",
                'ExceptionMessage'=> $error->getMessage(),
                'Excepetion'=>$error
            ];
            // $statusHttp = isset($error->status)?$error->status:500;
            $statusHttp = $error->status ?? 500;
            return response()->json($responseError,$statusHttp);
        }
    }

    public function update(Request $request, $id){
        try{
            $newProduto = $request->all();
            $newProduto['importado'] = $request->has('importado');
            // return response()->json($newProduto);
            $produto = Produto::findOrFail($id);
            $produto->update($newProduto);
            return response()->json([
                'msg'=>"Produto atualizado!!!",
                'produto'=>$produto
            ]);
        }catch(Exception $error){
            $responseError = [
                'Error'=>"Erro ao atualizar o produto!!!",
                'Exception'=> $error->getMessage(),
                // 'ExceptionTrace'=>$error->getTrace(),
            ];
            $statusHttp = 500;
            return response()->json($responseError,$statusHttp);
        }
    }

    public function delete($id){
        try{
            if(!Produto::destroy($id))
                throw new Exception("Recurso não existe ou não foi possével remover!!!");
            return response()->json(['msg'=>"Produto removido com sucesso!!!"]);
        }catch(Exception $error){
            return response()->json([
                'Error'=>"Erro ao remover o produto!!!",
                'Exception'=> $error->getMessage()
            ], 422);
        }

    }
}
