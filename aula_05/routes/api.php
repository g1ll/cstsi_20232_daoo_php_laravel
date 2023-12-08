<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\FornecedorController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('produtos',[ProdutoController::class,'index']);
Route::get('produtos/{id}',[ProdutoController::class,'show']);
Route::post('produtos',[ProdutoController::class,'store']);
Route::put('produtos/{id}',[ProdutoController::class,'update']);
Route::delete('produtos/{id}',[ProdutoController::class,'delete']);

Route::apiResource('fornecedores',FornecedorController::class)
        ->parameters(['fornecedores'=>'fornecedor'])
        ->middleware('auth:sanctum');


Route::middleware('auth:sanctum')
->get('fornecedores/{fornecedor}/produtos',
    [FornecedorController::class,'produtos']);

Route::apiResource('users',UserController::class);
Route::post('login',[LoginController::class, 'login']);
