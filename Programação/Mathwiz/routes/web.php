<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('Login');
});
Route::get('/cadastro', function () {
    return view('Cadastro');
});
Route::get('/home', function () {
    return view('TelaPrincipal');
});