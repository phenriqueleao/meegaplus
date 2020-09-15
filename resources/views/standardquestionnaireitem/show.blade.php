@extends('layouts.auth')

@section('title', 'Detalhes questão padrão')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">

        <h1>Questão {{ $item->number }}</h1>
        <ul>
            <li>Questionário: {{ $item->standard_questionnaire->name }} </li>
            <li>Número: {{ $item->number }}</li>
            <li>Enunciado: {{ $item->description }}</li>
        </ul>
        <form action=" {{ route('standardquestion.destroy', $item->id) }} " method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Apagar</button>
        </form>
        <a href=" {{ route('standardquestion.index') }} " class="btn btn-primary">Voltar</a>
      </div>
    </div>
</div>
@endsection