@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>Detalhes do chamado</h2>
        
        <p><b>Titulo:</b> {{$chamado->titulo}}</p>

    </div>
</div>
@endsection

