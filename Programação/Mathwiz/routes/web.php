<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\LicaoController;
use App\Models\Unidade;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
});


Route::get('/cadastro', [RegisterController::class, 'showRegistrationForm'])->name('cadastro')->middleware('guest');

Route::get('/home', function () {
    return view('TelaPrincipal')->with('unidade', session('unidade', 1)); 
})->middleware('auth')->name('home');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/game/{materia}/{licao}/', function ( $materiaId,$licaoId,) {
    $licao = \App\Models\Licao::find($licaoId);
    $materia = \App\Models\Materia::find($materiaId);

    session(['materia' => $materia->nome]); // Você pode salvar o nome ou o ID, conforme necessário

    return view('jogo', compact('licao', 'materia'));
})->name('game');



Route::get('/criar-unidades', [UnidadeController::class, 'createUnidades']);
Route::get('/criar-licoes', [LicaoController::class, 'createLicoes']);
Route::post('/selecionar-operacao', function () {
    $operacao = request('operacao');
    session(['operacao' => $operacao, 'unidade' => 1]); // Reinicia a unidade ao selecionar a operação
    return redirect()->route('home');
})->name('selecionar.operacao');

Route::post('/navegar-unidade', function () {
    $unidadeAtual = session('unidade', 1);
    $acao = request('acao');
    
    $operacao = session('operacao');
    $total = \App\Models\Unidade::where('materia_id', $operacao)->count();

    if ($acao == 'anterior' && $unidadeAtual > 1) {
        $unidadeAtual--;
    } elseif ($acao == 'proxima' && $unidadeAtual < $total ) { // Supondo que você tenha 9 unidades
        $unidadeAtual++;
    }

    session(['unidade' => $unidadeAtual]);
    return redirect()->route('home');
})->name('navegar.unidade');

Route::post('/trocar-operacao', function () {
    if (Session::has('operacao')) {
        Session::forget('operacao');
    }
    return redirect()->route('home');
})->name('trocar.operacao');
