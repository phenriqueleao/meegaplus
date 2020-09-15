@extends('layouts.auth')

@section('title', 'Detalhes questão padrão')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header h3">Avaliação: {{ $evaluation->game_name }}</div>
        <div class="card-body">
  
        @foreach ($standardquestions as $standardquestion)
        <form class="form" action=" {{ route('response.store') }} " method="post">
          @csrf  
          <input type="hidden" name="evaluation_id" value="{{ $evaluation->id }}" >
          <input type="hidden" name="student_id" value="{{ Auth::id() }}" >
          <input type="hidden" name="standard_questionnaire_item_id[{{ $standardquestion->id }}]" value="{{ $standardquestion->id }}" >
          <div class="form-group">
            <label for="{{ $standardquestion->id }}"><strong>{{ $standardquestion->number }}. {{ $standardquestion->description }}</strong></label>
          </div>
          <div class="form-group">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="response[{{ $standardquestion->id }}]" id="inlineRadio1" value="1">
              <label class="form-check-label" for="inlineRadio1">1</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="response[{{ $standardquestion->id }}]" id="inlineRadio2" value="2">
              <label class="form-check-label" for="inlineRadio2">2</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="response[{{ $standardquestion->id }}]" id="inlineRadio3" value="3">
              <label class="form-check-label" for="inlineRadio3">3</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="response[{{ $standardquestion->id }}]" id="inlineRadio3" value="4">
              <label class="form-check-label" for="inlineRadio3">4</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="response[{{ $standardquestion->id }}]" id="inlineRadio3" value="5">
              <label class="form-check-label" for="inlineRadio3">5</label>
            </div>
          </div>
          @endforeach
          <div class="form-group">
            <button type="submit" class="btn btn-success">Responder</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <a href=" {{ route('evaluation.index') }} " class="btn btn-primary">Voltar</a>
@endsection