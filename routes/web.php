<?php

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

Route::get('/login', 'HomeController@constructLogin')->name('login');

Route::get('/Cadastro', 'HomeController@constructCadastro')->name('cadastro');

Route::get('/Detalhes', 'HomeController@constructDetalhes')->name('detalhesConta');

Route::get('/home', 'HomeController@constructHome')->name('home');

Route::post('/Cadastro', 'UsuariosController@novoUsuario')->name('cadastro');

Route::post('/login', 'UsuariosController@login')->name('login');
