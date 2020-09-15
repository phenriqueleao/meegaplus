@extends('base')

@section('title', 'Cadastrar novo estudante')

@section('content')
    <h1>Cadastrar novo estudante</h1>
    <form class="form" action=" {{ route('student.store') }} " method="post">
        @csrf
        <div class="form-group">
            <select name="evaluation_id" id="cars">
                @foreach ($evaluations as $evaluation)
                    <option class="form-control" value="{{ $evaluation->id }}">{{ $evaluation->game_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Nome: ">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="E-mail: ">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Senha: ">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
@endsection