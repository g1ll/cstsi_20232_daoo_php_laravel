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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fornecedor $fornecedor)
    {
        //
    }
}
