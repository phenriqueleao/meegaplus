@extends('layouts.auth')

@section('content')
<div class="container">
  <div class="row">
    @include('layouts.navbar')
    <div class="col-md-10">
      <div class="h4">Lista de Avaliadores</div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="200">Nome:</th>
              <th width="120">E-mail:</th>
              <th>CPF:</th>
              <th>Instituição:</th>
              <th width="180">Ações:</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($evaluators as $evaluator)
              <tr>
                <td>{{ $evaluator->name }}</td>
                <td>{{ $evaluator->email }}</td>
                <td>{{ $evaluator->cpf }}</td>
                <td>{{ $evaluator->institution }}</td>
                <td width="120">
                  <a class="btn btn-primary float-left" href="{{ route('evaluator.edit', $evaluator->id) }}">Editar</a>
                  <form action=" {{ route('evaluator.destroy', $evaluator->id) }} " method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger float-right">Apagar</button>
                  </form>
                  <a href="{{ route('evaluator.show', $evaluator->id) }}">Detalhes</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <a href="/register/evaluator" class="btn btn-primary">Cadastrar novo avaliador</a>
    </div>
  </div>
</div>
@endsection