@extends('layouts.auth')

@section('title', 'Editar questão padrão {$item->number}')

@section('content')
<div class="container">
  <div class="row">
    @include('layouts.navbar')
    <div class="col-md-8">
      <div class="card">
        <div class="card-header h4">Editar questão padrão {{ $item->number }}</div>
        <div class="card-body">
        <form action="{{ route('standardquestion.update', $item->id) }}" method="post">
          @method('PUT')
          @csrf
          <label>Questionário:</label>
          <div class="form-group">
            <select class="form-control" name="standard_questionnaire_id">
              @foreach ($questionnaires as $questionnaire)
                <option class="form-control" value="{{ $questionnaire->id }}">{{ $questionnaire->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="number">Número:</label>
            <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" placeholder="Número: " value="{{ $item->number }}">
            @error('number')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Enunciado:</label>
            <input type="text" class="form-control" name="description" placeholder="Enunciado: " value="{{ $item->description}}">
          </div>
          <button type="submit" class="btn btn-success">Salvar</button>
          <a href=" {{ route('standardquestion.index') }} " class="btn btn-primary">Voltar</a>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection