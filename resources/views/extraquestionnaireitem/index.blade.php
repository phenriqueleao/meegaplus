@extends('base')

@section('content')
    <h1>Lista de questões extra</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="100">Questionário:</th>
                <th width="120">Questão nº:</th>
                <th>Enunciado:</th>
                <th>Ações:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->evaluation_id }}</td>
                    <td>{{ $item->number }}</td>
                    <td>{{ $item->description }}</td>
                    <td width="120">
                        <a href="{{ route('extraquestion.edit', $item->id) }}">Editar</a>
                        <a href="{{ route('extraquestion.show', $item->id) }}">Detalhes</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('extraquestion.create') }}" class="btn btn-primary">Cadastrar nova questão</a>
@endsection
    
