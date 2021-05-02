@extends('template.painel-admin')
@section('title', 'Edição de usuários')
@section('content')

<h4 class="mb-4">Edição de Usuários</h4>
<form method="POST" action="{{route('usuarios2.editar', $item)}}">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input value="{{$item->nome}}" type="text" class="form-control" id="" name="nome" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input value="{{$item->email}}" type="email" class="form-control" id="" name="email">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Senha</label>
                    <input value="{{$item->senha}}" type="text" class="form-control" id="senha" name="senha">
                </div>
            </div>
        </div>


    
        <p align="right">
        <input value="{{$item->email}}" type="hidden" name="oldemail">
        <input value="{{$item->senha}}" type="hidden" name="oldsenha">
        <!--hidden é para ser um campo oculto, que não apareça no formulário-->
        <button type="submit" class="btn btn-primary">Salvar</button>
        </p>
    </form>

@endsection

