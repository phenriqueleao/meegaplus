@extends('base')

@section('title', 'Detalhes questão padrão')

@section('content')
  <h1>Estudante {{ $student->name }}</h1>
  <ul>
    <li>Avaliação: {{ $student->evaluation->game_name }} </li>
    <li>Nome: {{ $student->name }}</li>
    <li>E-mail: {{ $student->email }}</li>
  </ul>
  <form action=" {{ route('student.destroy', $student->id) }} " method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Apagar</button>
  </form>
  <a href=" {{ route('student.index') }} " class="btn btn-primary">Voltar</a>
@endsection