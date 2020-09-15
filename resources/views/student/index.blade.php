@extends('layouts.auth')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="h4">Lista de Estudantes</div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="200">Avaliação:</th>
              <th width="120">Nome:</th>
              <th>E-mail:</th>
              <th width="180">Ações:</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($students as $student)
              <tr>
                <td>{{ $student->evaluation->game_name }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td width="120">
                  <a class="btn btn-primary float-left" href="{{ route('student.edit', $student->id) }}">Editar</a>
                  <form action=" {{ route('student.destroy', $student->id) }} " method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger float-right">Apagar</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <a href="/register/student" class="btn btn-primary">Cadastrar novo estudante</a>
    </div>
  </div>
</div>
@endsection