<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/',[\App\Http\Controllers\PrincipalController::class,'Principal'])->name('site.index');
Route::get('/sobre-nos',[\App\Http\Controllers\SobreNosController::class,'sobreNos'])->name('site.sobrenos');
Route::get('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::get('/login', function(){ return 'Login'; })->name('site.login');


Route::prefix('/app')->group(function(){
    Route::get('/cliente', function(){ return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', function(){ return 'Fornecedores'; })->name('app.fornecedores');
    Route::get('/produtos', function(){ return 'Produtos'; })->name('app.produtos');
});

Route::fallback(function(){
    echo 'A rota acessada nao existe. Clique <a href="'.route('site.index').'">aqui</a> para voltar a rota principal';
});