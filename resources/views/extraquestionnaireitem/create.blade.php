@extends('base')

@section('title', 'Cadastrar nova questão extra')

@section('content')
    <h1>Cadastrar nova questão extra</h1>

    <form class="form" action=" {{ route('extraquestion.store') }} " method="post">
        @csrf
        <div class="form-group">
            <select name="evaluation_id" id="evaluation">
                @foreach ($evaluations as $evaluation)
                    <option class="form-control" value="{{ $evaluation->id }}">{{ $evaluation->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select name="standard_questionnaire_id" id="sqid">
                @foreach ($questionnaires as $questionnaire)
                    <option class="form-control" value="{{ $questionnaire->id }}">{{ $questionnaire->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="evaluation_id" placeholder="Avaliação: ">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="number" placeholder="Número: ">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="description" placeholder="Enunciado: ">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
@endsection