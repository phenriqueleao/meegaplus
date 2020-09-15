@extends('base')

@section('title', 'Cadastrar novo estudante')

@section('content')
    <h1>Cadastrar nova resposta</h1>
    <form class="form" action=" {{ route('response.store') }} " method="post">
        @csrf
        <div class="form-group">
            <select name="evaluation_id">
                @foreach ($evaluations as $evaluation)
                    <option class="form-control" value="{{ $evaluation->id }}">{{ $evaluation->game_name }}</option>
                @endforeach
            </select>
        </div>
        @if (count($standardquestions) != 0)
            <div class="form-group">
                <select name="standard_questionnaire_item_id">
                    @foreach ($standardquestions as $standardquestion)
                        <option class="form-control" value="{{ $standardquestion->id }}">{{ $standardquestion->description }}</option>
                    @endforeach
                </select>
            </div>
        @else
            <div class="form-group">
                <select name="extra_questionnaire_item_id">
                    @foreach ($extraquestions as $extraquestion)
                        <option class="form-control" value="{{ $extraquestion->id }}">{{ $extraquestion->description }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        
        <div class="form-group">
            <select name="student_id">
                @foreach ($students as $student)
                    <option class="form-control" value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="response" placeholder="response: ">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
@endsection