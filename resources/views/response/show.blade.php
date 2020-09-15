@extends('base')

@section('title', 'Detalhes resposta')

@section('content')
  <h1>Resposta</h1>
  <ul>
    <li> {{ $response }} </li>
  </ul>
  
  <form action=" {{ route('response.destroy', $response->id) }} " method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Apagar</button>
  </form>
  
  <a href=" {{ route('response.index') }} " class="btn btn-primary">Voltar</a>
@endsection