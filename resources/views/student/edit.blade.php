@extends('layouts.auth')

@section('title', 'Editar questão padrão {$item->number}')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header h4">Editar estudante {{ $student->name }}</div>
        <div class="card-body">
          <form action="{{ route('student.update', $student->id) }}" method="post">
            @method('PUT')
            @csrf
            <label>Avaliação:</label>
            <div class="form-group">
              <select class="form-control" name="evaluation_id" id="cars">
                @foreach ($evaluations as $evaluation)
                  <option class="form-control" value="{{ $evaluation->id }}">{{ $evaluation->game_name }}</option>
                @endforeach
              </select>
            </div>
            <label>Nome:</label>
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Nome: " value="{{ $student->name }}">
            </div>
            <label>E-mail:</label>
            <div class="form-group">
              <input type="text" class="form-control" name="email" placeholder="Enunciado: " value="{{ $student->email}}">
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href=" {{ route('student.index') }} " class="btn btn-primary">Voltar</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection