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
*/
/*
Route::get('/', function () {
    return 'Hello World' ;
});

Route::get('/sobre-nos', function () {
    return 'Sobre nós';
});

Route::get('/contato', function () {
    return 'contato' ;
});
*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato','ContatoController@contato')->name('site.contato');
Route::get('/login', function() {return 'Login';})->name('site.login');

//app é uma sub rota (agrupamento de rotas)
Route::prefix('/app')->group(function(){
    Route::get('/clientes',function() {return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores',function() {return 'Fornecedores';})->name('app.fornecedores');
    Route::get('/produtos',function() {return 'Produtos';})->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@Teste')->name('teste');

Route::fallback(function(){
    echo 'A rota acessada não existe,<a href="'.route('site.index').'">clique aqui</a> para ser ir para a pagina inicial';
});
