@extends('adminlte::page')

@section('title', 'Ludeño')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<p>Welcome to this beautiful admin panel.</p>
Roles

<a class="btn btn-warning" href="{{ route('roles.create') }}">Nuevo</a>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hola');
</script>
@stop