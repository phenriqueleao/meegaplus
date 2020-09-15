@extends('layouts.auth')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Editar avaliador') }}</div>
        <div class="card-body">
          <form action="{{ route('evaluator.update', $evaluator->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name" placeholder="Nome: " value="{{ $evaluator->name }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="email" placeholder="Enunciado: " value="{{ $evaluator->email}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="cpf" placeholder="CPF: " value="{{ $evaluator->cpf}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="institution" class="col-md-4 col-form-label text-md-right">{{ __('Instituição') }}</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="institution" placeholder="Instituição: " value="{{ $evaluator->institution}}">
              </div>
              </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection