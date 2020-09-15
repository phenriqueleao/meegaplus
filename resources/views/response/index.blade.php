@extends('base')

@section('content')
  <h1>Lista de response</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id:</th>
        <th>avaliação:</th>
        <th>Id questão padrão:</th>
        <th>Id questão extra:</th>
        <th>Aluno:</th>
        <th>resposta:</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($responses as $response)
          <tr>
            <td>{{ $response->id }}</td>
            <td>{{ $response->evaluation_id }}</td>
            <td>{{ $response->standard_questionnaire_item_id }}</td>
            <td>{{ $response->extra_questionnaire_item_id }}</td>
            <td>{{ $response->student_id }}</td>
            <td>{{ $response->response }}</td>
            <td width="120">
              <a href="{{ route('response.edit', $response->id) }}">Editar</a>
              <a href="{{ route('response.show', $response->id) }}">Detalhes</a>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>
  <a href="{{ route('response.create') }}" class="btn btn-primary">Cadastrar nova response</a>
@endsection
    
