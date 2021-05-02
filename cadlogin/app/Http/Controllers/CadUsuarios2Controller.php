<?php

namespace App\Http\Controllers;

use App\Models\usuario2;
use Illuminate\Http\Request;

class CadUsuarios2Controller extends Controller
{
    public function index(){
        $tabela = usuario2::orderby('id', 'desc')->paginate();
        return view('painel-admin.usuarios2.index', ['itens' => $tabela]);
    }

    public function create(){
        return view('painel-admin.usuarios2.create');
    }


    public function insert(Request $request){
        $tabela = new usuario2();
        $tabela->nome = $request->nome;
        $tabela->email = $request->email;
        $tabela->senha = $request->senha;

        $itens = usuario2::where('email', '=', $request->email)->orwhere('senha', '=', $request->senha) ->count(); //count retorna quantas linhas ele gerou dessa consulta
        if ($itens > 0){
            echo "<script language='javascript'> window.alert('Registro já cadastrado!') </script>";
            return view('painel-admin.usuarios2.edit', ['item' => $tabela]);   
        };
       

        $tabela->save();
        return redirect()->route('usuarios2.index');
    }






     public function edit(usuario2 $item){
        return view('painel-admin.usuarios2.edit', ['item' => $item]);   
     }
 
     public function editar(Request $request, usuario2 $item){
         
         $item->nome = $request->nome;
         $item->email = $request->email;
         $item->senha = $request->senha;

        $oldemail = $request->oldemail;
        $oldsenha = $request->oldsenha;

        if($oldemail != $request->email){
            $itens = usuario2::where('email', '=', $request->email) ->count(); //count retorna quantas linhas ele gerou dessa consulta
            if ($itens > 0){
                echo "<script language='javascript'> window.alert('Email já cadastrado!') </script>";
                return view('painel-admin.usuarios2.edit', ['item' => $item]);
            }
        }

        if($oldsenha != $request->senha){
            $itens = usuario2::where('senha', '=', $request->senha) ->count(); //count retorna quantas linhas ele gerou dessa consulta
            if ($itens > 0){
                echo "<script language='javascript'> window.alert('Senha já cadastrada!') </script>";
                return view('painel-admin.usuarios2.edit', ['item' => $item]);
            }
        }


         $item->save();
         return redirect()->route('usuarios2.index');
 
     }




     

     public function delete(usuario2 $item){
        $item->delete();
        return redirect()->route('usuarios2.index');
     }

     public function modal($id){
        $item = usuario2::orderby('id', 'desc')->paginate();
        return view('painel-admin.usuarios2.index', ['itens' => $item, 'id' => $id]);

     }


}
