@extends('layouts.auth')

@section('content')
<div class="container">
  <div class="row">
    @include('layouts.navbar')
    <div class="col-md-10">

      <div class="h4">Lista de questões padrão</div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="100">Questionário:</th>
              <th width="120">Questão nº:</th>
              <th>Enunciado:</th>
              <th width="180">Ações:</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($items as $item)
              <tr>
                <td>{{ $item->standard_questionnaire->name }}</td>
                <td>{{ $item->number }}</td>
                <td>{{ $item->description }}</td>
                <td width="120">
                  <a class="btn btn-primary float-left" href="{{ route('standardquestion.edit', $item->id) }}">Editar</a>
                  <form action=" {{ route('standardquestion.destroy', $item->id) }} " method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger float-right">Apagar</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      <a href="{{ route('standardquestion.create') }}" class="btn btn-primary">Cadastrar nova questão</a>

    </div>
  </div>
</div>
@endsection
    
