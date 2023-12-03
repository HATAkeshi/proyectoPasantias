@extends('adminlte::page')

@section('title', 'Ludeño')

@section('content_header')
<div class="card">
    <div class="card-body">
        <h2>Roles</h2>
    </div>
</div>
@stop

@section('content')

@can('crear-rol')
<a href="{{ route('roles.create')}}" class="btn btn-warning">Nuevo</a>
@endcan

<table class="table table-striped table-hover table-bordered mt-2">
    <thead class="table-dark">
        <th>Rol</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>
                @can('editar-rol')
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Editar</a>
                @endcan

                @can('borrar-rol')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id], 'style'=>'display:inline']) !!}

                {!! Form::submit('Borrar', ['class'=>'btn btn-danger']) !!}

                {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination justify-content-end">
    @if ($roles->lastPage() > 1)
    <ul class="pagination">
        <li class="page-item {{ ($roles->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $roles->url(1) }}" class="page-link">Primera</a>
        </li>
        @for ($i = 1; $i <= $roles->lastPage(); $i++)
            <li class="page-item {{ ($roles->currentPage() == $i) ? ' active' : '' }}">
                <a href="{{ $roles->url($i) }}" class="page-link">{{ $i }}</a>
            </li>
            @endfor
            <li class="page-item {{ ($roles->currentPage() == $roles->lastPage()) ? ' disabled' : '' }}">
                <a href="{{ $roles->url($roles->lastPage()) }}" class="page-link">Última</a>
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