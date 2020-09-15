@extends('layouts.app')

@section('title', 'MEEGA+')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="row">
      <a class="btn btn-primary btn-lg btn-block" href="/login/evaluator" role="button">Sou instrutor</a>
      <a class="btn btn-primary btn-lg btn-block" href="/login/student" role="button">Sou aluno</a>
      <a class="btn btn-primary btn-lg btn-block" href="/about" role="button">Sobre o MEEGA+</a>
      <a class="btn btn-primary btn-lg btn-block" href="/contact" role="button">Contato</a>
    </div>
  </div>
</div>
    
@endsection