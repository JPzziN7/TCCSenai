<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno; // O modelo que representa a tabela 'alunos'
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AlunoLicaoController;

class RegisterController extends Controller
{
    // Exibe o formulário de registro
    public function showRegistrationForm()
    {
        return view('Cadastro'); // Certifique-se de que esta view existe
    }

    // Trata o envio do formulário de registro
    public function register(Request $request)
    {
        // Validação dos dados do formulário
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:alunos', // Validação do username
            'email' => 'required|string|email|max:255|unique:alunos',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cria um novo registro no banco de dados
        $aluno = Aluno::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Criptografando a senha
        ]);

        // Libera as primeiras lições para o aluno recém-criado
        $alunoLicaoController = new AlunoLicaoController();
       app(\App\Http\Controllers\AlunoLicaoController::class)->liberarPrimeiraLicao($aluno);


        // Autentica o usuário após o registro
        Auth::login($aluno);

        // Redireciona para a página inicial ou de sucesso
        return redirect('/home')->with('success', 'Cadastro realizado com sucesso!');
    }
}
