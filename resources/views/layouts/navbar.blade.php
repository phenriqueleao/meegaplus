<div class="col-md-2">
  <nav class="nav flex-column">
    <a class="nav-link active" href="#">Página Inicial</a>
    <a class="nav-link" href="{{ route('evaluation.index') }}">Avaliações</a>
    @if (Auth::guard('admin')->check() || Auth::guard('evaluator')->check())
      <a class="nav-link" href="{{ route('evaluation.create') }}">Nova avaliação</a>
    @endif
    @if (Auth::guard('admin')->check())
      <a class="nav-link" href="{{ route('evaluator.index') }}">Avaliadores</a>
      <a class="nav-link" href="{{ route('standardquestionnaire.index') }}">Questionário padrão</a>
      <a class="nav-link" href="{{ route('standardquestion.index') }}">Questões padrão</a>
    @endif
  </nav>
</div>