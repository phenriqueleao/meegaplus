@extends('layouts.auth')

@section('title', 'Cadastrar nova avaliação')

@section('content')
<div class="container">
  <div class="row">
    @include('layouts.navbar')
    <div class="col-md-8">
      <div class="card">
        <div class="card-header h4">Cadastrar nova avaliação</div>
        <div class="card-body">

          <form class="form" action=" {{ route('evaluation.store') }} " method="post">
            @csrf
            <input type="hidden" name="evaluator_id" value="{{ Auth::user()->id }}" >
            <div class="form-group">
              <label>Questionário:</label>
              <select class="form-control" name="standard_questionnaire_id" id="questionnaire">
                @foreach ($questionnaires as $questionnaire)
                  <option class="form-control" value="{{ $questionnaire->id }}">{{ $questionnaire->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="course">Curso:</label>
              <input id="course" type="text" class="form-control  @error('course') is-invalid @enderror" name="course" placeholder="Sistemas para Internet, Ciência da Computação... ">
              @error('course')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="class">Turma:</label>
              <input id="class" type="text" class="form-control  @error('class') is-invalid @enderror" name="class" placeholder="Turma ">
              @error('class')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="discipline">Disciplina:</label>
              <input id="discipline" type="text" class="form-control  @error('discipline') is-invalid @enderror" name="discipline" placeholder="Engenharia de Software, Estruturas de Dados, etc...">
              @error('discipline')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="institution">Instituição de ensino:</label>
              <input type="text" class="form-control  @error('institution') is-invalid @enderror" name="institution" placeholder="Instituição: ">
              @error('institution')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="game_name">Nome do jogo:</label>
              <input type="text" class="form-control  @error('game_name') is-invalid @enderror" name="game_name" placeholder="Nome do jogo: ">
              @error('game_name')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="date">Data:</label>
              <input id="date" type="date" class="form-control  @error('date') is-invalid @enderror" name="date" placeholder="Data: ">
              @error('date')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Salvar</button>
              <a href=" {{ route('evaluation.index') }} " class="btn btn-primary">Voltar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection