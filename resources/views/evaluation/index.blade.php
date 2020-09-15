@extends('layouts.auth')

@section('content')
<div class="container">
  <div class="row">
    @include('layouts.navbar')
    <div class="col-md-10">
      <div class="h4">Lista de avaliações</div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="150">Nome do Jogo:</th>
              <th>Instituição:</th>
              <th>Curso:</th>
              <th>Disciplina:</th>
              <th>Turma:</th>
              <th>Avaliador:</th>
              <th>Data:</th>
              <th width="180">Ações:</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($evaluations as $evaluation)
              @if ($evaluation->evaluator->id == Auth::id())
                <tr>
                  <td>{{ $evaluation->game_name }}</td>
                  <td>{{ $evaluation->institution }}</td>
                  <td>{{ $evaluation->course }}</td>
                  <td>{{ $evaluation->discipline }}</td>
                  <td>{{ $evaluation->class }}</td>
                  <td>{{ $evaluation->evaluator->name }}</td>
                  <td>{{ $evaluation->date }}</td>
                  <td width="120">
                    <a href="{{ route('evaluation.edit', $evaluation->id) }}">Editar</a>
                    <a href="{{ route('evaluation.show', $evaluation->id) }}">Detalhes</a>
                    <form action=" {{ route('evaluation.destroy', $evaluation->id) }} " method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Apagar</button>
                    </form>
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
    </div>
  </div>
</div>
@endsection
    
