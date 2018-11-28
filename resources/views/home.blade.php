@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Lista de chamados</h2>
        @forelse($chamados as $key => $value)
        @can('ver-chamado', $value)
        <p>{{$value->titulo}}</p>
        @endcan
        @empty
        <p>Não existem chamados!</p>
        @endforelse
    </div>
</div>
@endsection
