<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login(Request $request){ //request para pegar uma requisição

        $usuario = $request->usuario;
        $senha = $request->senha;

        $usuarios = usuario::where('usuario', '=', $usuario)->where('senha', '=', $senha) ->first(); //first devolve o primeiro registro que ele encontrar
        if(@$usuarios->id != null){ //@ para mostrar se é indefinido ou não
            @session_start();
            $_SESSION['id_usuario'] = $usuarios->id;
            $_SESSION['nome_usuario'] = $usuarios->nome;
            $_SESSION['nivel_usuario'] = $usuarios->nivel;
            $_SESSION['usuario_usuario'] = $usuarios->usuario;


            if($_SESSION['nivel_usuario'] == 'admin'){
                return view('painel-admin.index'); //retorna a tela para o admin
            }


        }else{
            echo "<script language='javascript'> window.alert('Dados Incorretos!') </script>";
            return view('index');
        }
    }

    public function logout(){
        @session_start();
        @session_destroy();
        return view('index');
    }
}
