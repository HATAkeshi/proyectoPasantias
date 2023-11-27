@extends('adminlte::page')

@section('title', 'Ludeño')

@section('content_header')
<h2>Alquiler de andamios</h2>
@stop

@section('content')
<div id="formularioContainer">
    <!-- El formulario se cargará aquí mediante AJAX -->
    <form action="" method="post">
        @csrf

        <!--aqui la hora y fecha-->
        @if($isAdmin)
            <input type="datatime-local" name="fecha_hora" value="{{ date('Y-m-d\TH:i', time()) }}">
        @else
            <input type="datatime-local" name="fecha_hora" value="{{ date('Y-m-d\TH:i', time()) }}" disabled>
        @endif
    </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hola');
</script>
<script src="{{ asset('js/ajax.js') }}"></script>
@stop