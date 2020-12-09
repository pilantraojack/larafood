@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" data-toggle="tooltip" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}" data-toggle="tooltip" title="Cargos">Cargos</a></li>
    </ol>
@stop

@section('content')
    <h3>Cargos</h3>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('roles.create') }}" class="btn btn-dark mb-2" data-toggle="tooltip" title="Novo Cargo">Novo Cargo</a>
            <form action="{{ route('roles.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control col-md-4 ">
                <button type="submit" class="btn btn-dark ml-2" data-toggle="tooltip" title="Filtrar">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info" data-toggle="tooltip" title="Editar">Editar</a>
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning" data-toggle="tooltip" title="Detalhes">Detalhes</a>
                                <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-primary" data-toggle="tooltip" title="Permissões"><i class="fas fa-lock"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! $roles->links() !!}
        </div>
    </div>
@endsection
