@extends('template.painel-admin')
@section('title', 'Cadastro de usuários')
@section('content')

<h4 class="mb-4">Cadastro de Usuários</h4>
<form method="POST" action="{{route('usuarios2.insert')}}">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="" name="nome" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="" name="email">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Senha</label>
                    <input type="text" class="form-control" id="senha" name="senha">
                </div>
            </div>
        </div>


    
        <p align="right">
        <button type="submit" class="btn btn-primary">Salvar</button>
        </p>
    </form>

@endsection

