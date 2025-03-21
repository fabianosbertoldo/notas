<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $request){

        // Form validation
        $request->validate(
            // regras
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            //definindo erro mensagens para cada regra
            [
                'text_username.required'=> 'O campo usuario é obrigatório',
                'text_username.email'=> 'O campo usuario deve ser um email válido',
                'text_password.required'=> 'O campo email é obrigatório',
                'text_password.min'=> 'O campo senha deve possuir no mínimo :min caracteres',
                'text_password.max'=> 'O campo senha deve possuir no máximo :max caracteres',
            ]
        );

        // get user input
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        // teste database concetion
        try{
            DB::connection()->getPdo();
            echo 'Conexão OK!';
        } catch (\PDOException $e){
           echo 'conexão falhou: ' . $e->getMessage();
        }
        
    }
   
    public function logout(){
        return view('logout');
    }
    
}
