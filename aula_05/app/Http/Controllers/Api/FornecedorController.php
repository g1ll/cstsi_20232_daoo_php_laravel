<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fornecedor;
use Exception;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Fornecedor::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $newFornecedor = $request->all();
            $storedFornecedor = Fornecedor::create($newFornecedor);
            return response()->json([
                'msg'=>"Fornecedor inserido!!!",
                'Fornecedor'=>$storedFornecedor
            ]);
        }catch(Exception $error){
            $responseError = [
                'Error'=>"Erro ao inserir o Fornecedor!!!",
                'Exception'=> $error->getMessage(),
                // 'ExceptionTrace'=>$error->getTrace(),
            ];
            $statusHttp = 500;
            return response()->json($responseError,$statusHttp);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Fornecedor $fornecedor)
    {
        return $fornecedor;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fornecedor $fornecedor)
    {
        try{
            $fornecedor->update($request->all());
            return response()->json([
                "msg"=>"Fornecedor atualizado",
                "fornecedor"=>$fornecedor
            ]);
        }catch(Exception $error){
            return response()->json([
                "Erro"=>"Erro ao atualizar o fornecedor",
                "Exception"=>$error->getMessage()
            ],401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fornecedor $fornecedor)
    {
        try {
            $fornecedor->delete();//mixed
            return response()->json([
                'Message'=>"Fornecedor id:$fornecedor->id removido!",
            ]);
        } catch(\Exception $error) {
            $responseError = [
                'Message'=>"O fornecedor de id:$fornecedor->id não foi encontrado!",
                'Exception'=>$error->getMessage()
            ];
            return response()->json($responseError,500);
        }
    }

    public function produtos(Request $request, Fornecedor $fornecedor){
        $perPage = $request->query('per_page');
        $produtosRelation = $fornecedor->produtos();
        $paginator = $produtosRelation->paginate($perPage);
        $paginator->appends(['per_page'=>$perPage]);
        return response()->json($paginator);
    }
}
