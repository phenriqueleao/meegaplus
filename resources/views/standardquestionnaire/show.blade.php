@extends('base')

@section('title', 'Questionários')

@section('content')
    <h1>Questionário: {{ $standardquestionnaire->name }}</h1>

    @foreach ($standardquestions as $standardquestion)
        <p>{{ $standardquestion->id }}</p>
    @endforeach
    <form action=" {{ route('standardquestionnaire.destroy', $standardquestionnaire->id) }} " method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Apagar</button>
    </form>
    <a href=" {{ route('standardquestionnaire.index') }} " class="btn btn-primary">Voltar</a>
@endsection
