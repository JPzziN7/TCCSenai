<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Para lidar com autenticação
use App\Models\Aluno; // Modelo da tabela 'alunos'

class LoginController extends Controller
{
    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('Login'); // Certifique-se de que a view existe
    }

    // Lida com o login
    public function login(Request $request)
{
    // Validação dos campos do formulário
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Tenta autenticar o usuário com base no username e senha
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        // Se a autenticação for bem-sucedida, redireciona para a home
        return redirect()->intended('/home'); // Redireciona para a home
    }

    // Se a autenticação falhar, retorna com uma mensagem de erro
    return redirect()->back()->withErrors([
        'error' => 'As credenciais fornecidas não correspondem aos nossos registros.',
    ])->withInput();
}


    // Lida com o logout do usuário
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
