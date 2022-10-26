<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(static function(){ //prefixo para todos os endpoints

    Route::get('/vendedores', [App\Http\Controllers\vendedoresApiController::class, 'index']); //get para obter informações, chama o método index da api controller.
    Route::post('/vendedores', [App\Http\Controllers\vendedoresApiController::class, 'store']);
    Route::delete('/vendedores/{id}', [App\Http\Controllers\vendedoresApiController::class, 'destroy']);
    Route::put('/vendedores/{id}', [App\Http\Controllers\vendedoresApiController::class, 'update']);

    Route::get('/clientes', [App\Http\Controllers\clientesApiController::class, 'index']); //get para obter informações, chama o método index da api controller.
    Route::post('/clientes', [App\Http\Controllers\clientesApiController::class, 'store']);
    Route::delete('/clientes/{id}', [App\Http\Controllers\clientesApiController::class, 'destroy']);
    Route::put('/clientes/{id}', [App\Http\Controllers\clientesApiController::class, 'update']);

    Route::get('/produtos', [App\Http\Controllers\produtoApiController::class, 'index']); //get para obter informações, chama o método index da api controller.
    Route::post('/produtos', [App\Http\Controllers\produtoApiController::class, 'store']);
    Route::delete('/produtos/{id}', [App\Http\Controllers\produtoApiController::class, 'destroy']);
    Route::put('/produtos/{id}', [App\Http\Controllers\produtoApiController::class, 'update']);





});
