@extends('adminlte::page')

@section('title', 'Ludeño')

@section('content_header')
<h2>Usuarios</h2>
@stop

@section('content')
<!-- crear -->
<a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>
<table class="table table-striped table-hover table-bordered mt-2">
    <thead class="table-dark">
        <th style="display: none">ID</th>
        <th>Nombre</th>
        <th>E-mail</th>
        <th>Rol</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td style="display: none">{{$usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td>
            <td>
                @if (!empty($usuario->getRoleNames()))
                @foreach ($usuario->getRoleNames() as $rolName)
                <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                @endforeach
                @endif
            </td>
            <td>
                <a class="btn btn-info" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- paginacion -->
<div class="pagination justify-content-end">
    <!-- Mostrar los datos de los usuarios aquí -->
    @if ($usuarios->lastPage() > 1)
    <ul class="pagination">
        <li class="{{ ($usuarios->currentPage() == 1) ? 'disabled' : '' }}">
            <a href="{{ $usuarios->url(1) }}">Primera</a>
        </li>
        @for ($i = 1; $i <= $usuarios->lastPage(); $i++)
            <li class="{{ ($usuarios->currentPage() == $i) ? 'active' : '' }}">
                <a href="{{ $usuarios->url($i) }}">{{ $i }}</a>
            </li>
            @endfor
            <li class="{{ ($usuarios->currentPage() == $usuarios->lastPage()) ? 'disabled' : '' }}">
                <a href="{{ $usuarios->url($usuarios->lastPage()) }}">Última</a>
            </li>
    </ul>
    @endif
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hola');
</script>
@stop