@extends('layouts.auth')

@section('title', 'Detalhes questão padrão')

@section('content')
    <h1>Avaliador {{ $evaluator->name }}</h1>
    <ul>
        <li>Nome: {{ $evaluator->name }}</li>
        <li>E-mail: {{ $evaluator->email }}</li>
        <li>CPF: {{ $evaluator->cpf }}</li>
        <li>Instituição: {{ $evaluator->institution }}</li>
    </ul>
    <form action=" {{ route('evaluator.destroy', $evaluator->id) }} " method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Apagar</button>
    </form>
    <a href=" {{ route('evaluator.index') }} " class="btn btn-primary">Voltar</a>
@endsection