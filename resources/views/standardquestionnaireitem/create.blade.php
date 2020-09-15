@extends('layouts.auth')

@section('title', 'Cadastrar nova questão padrão')

@section('content')
<div class="container">
  <div class="row">
    @include('layouts.navbar')
    <div class="col-md-8">
      <div class="card">
        <div class="card-header h4">Cadastrar nova questão padrão</div>
        <div class="card-body">
        <form class="form" action=" {{ route('standardquestion.store') }} " method="post">
          @csrf
          <div class="form-group">
            <label for="standard_questionnaire_id">Questionário:</label>
            <select id="standard_questionnaire_id" class="form-control" name="standard_questionnaire_id" required>
              @foreach ($questionnaires as $questionnaire)
                <option class="form-control" value="{{ $questionnaire->id }}">{{ $questionnaire->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="number">Número:</label>
            <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" placeholder="Ex: 1, 2, 3... ">
            @error('number')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="description">Enunciado:</label>
            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Ex: Você gostou deste jogo? ">
            @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href=" {{ route('standardquestion.index') }} " class="btn btn-primary">Voltar</a>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection