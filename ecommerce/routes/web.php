<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VendedoresController;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/avisos', function () {

    /*
        Comandos XPTO
    */

    $avisos = [ 'avisos' => [ 0 => ['data' => '06/09/022',
                                    'aviso' => 'Amanhã será o bicentenário da Independência do Brasil',
                                    'exibir' => true],
                              1 => ['data' => '05/09/022',
                                    'aviso' => 'Depois de amanhã será o bicentenário da Independência do Brasil',
                                    'exibir' => true],
                              2 => ['data' => '07/09/022',
                                    'aviso' => 'Hoje é bicentenário da Independência do Brasil',
                                    'exibir' => true],
                              3 => ['data' => '08/09/022',
                                    'aviso' => 'Ontem foi o bicentenário da Independência do Brasil',
                                    'exibir' => true]]];

    return view('avisos', $avisos);
});

Route::resource('/clientes', App\Http\Controllers\ClientesController::class);

Route::resource('/vendedores', App\Http\Controllers\VendedoresController::class);

Route::resource('/produtos', App\Http\Controllers\ProdutoController::class);
