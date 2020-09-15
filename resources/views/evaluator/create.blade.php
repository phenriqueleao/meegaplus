@extends('base')

@section('title', 'Cadastrar novo estudante')

@section('content')
    <h1>Cadastrar novo avaliador</h1>
    <form class="form" action=" {{ route('evaluator.store') }} " method="post">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Nome: ">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="E-mail: ">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="cpf" placeholder="CPF: ">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="institution" placeholder="Instituição: ">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Senha: ">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
@endsection