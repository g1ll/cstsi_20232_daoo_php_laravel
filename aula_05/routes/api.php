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
    return $request->user()->currentAccessToken();
});

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('fornecedores', FornecedorController::class)
            ->parameters(['fornecedores'=>'fornecedor'])
            ->middleware('ability:is-admin');

    Route::controller(FornecedorController::class)->group(function(){
        Route::get('fornecedores','index');
        Route::get('fornecedores/{fornecedor}','show');
        Route::get('fornecedores/{fornecedor}/produtos','produtos');
        Route::get('fornecedores/regiao/{nomeRegiao}','regiao');
    });

    Route::apiResource('produtos',ProdutoController::class);
    Route::apiResource('users', UserController::class);
    Route::post('logout', [LoginController::class,'logout']);
});

Route::controller(ProdutoController::class)->group(function(){
    Route::get('produtos','index');
    Route::get('produtos/{produto}','show');
});

Route::post('users', [UserController::class,'store']);
Route::post('login', [LoginController::class,'login']);
