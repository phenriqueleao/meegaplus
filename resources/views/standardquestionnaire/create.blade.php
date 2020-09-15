@extends('layouts.auth')

@section('title', 'Cadastrar novo questionário')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header h4">Cadastrar novo questionário</div>
          <div class="card-body">    

            <form class="form" action=" {{ route('standardquestionnaire.store') }} " method="post">
                @csrf
                <div class="form-group">
                  <label for="name">Nome:</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nome do questionário... ">
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Salvar</button>
                  <a href=" {{ route('standardquestionnaire.index') }} " class="btn btn-primary">Voltar</a>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection