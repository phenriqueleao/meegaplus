@extends('layouts.auth')

@section('content')
<div class="container">
  <div class="row">
    @include('layouts.navbar')
    <div class="col-md-10">
      <div class="h4">Lista de questionários padrão</div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="400">Questionário:</th>
              <th>Ações:</th>
            </tr>
          </thead>
        <tbody>
          @foreach ($standardquestionnaires as $standardquestionnaire)
            <tr>
              <td>{{ $standardquestionnaire->name }}</td>
              <td width="10">
                <a class="btn btn-primary float-left" href="{{ route('standardquestionnaire.edit', $standardquestionnaire->id) }}">Editar</a>
                <form action=" {{ route('standardquestionnaire.destroy', $standardquestionnaire->id) }} " method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger float-right">Apagar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
    </table>
    <a href="{{ route('standardquestionnaire.create') }}" class="btn btn-primary">Cadastrar novo questionário</a>
      </div>
    </div>
</div>
@endsection
    