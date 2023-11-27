@extends('adminlte::page')

@section('title', 'Ludeño')

@section('content_header')
<h2>Constructora Ludeño</h2>
@stop

@section('content')
<div id="formularioContainer">
    <!-- El formulario se cargará aquí mediante AJAX -->
    <form action="" method="post">
        
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