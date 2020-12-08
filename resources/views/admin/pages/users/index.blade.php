@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" title="Usuários" class="active">Usuários</a></li>
    </ol>
@stop

@section('content')
    <h3>Listagem dos Usuários</h3>

    <div class="card">
        <div class="card-header">
            <a class="btn btn-dark mb-2" href="{{ route('users.create') }}" title="Novo Usuário">Novo Usuário</a>
            <form action="{{ route('users.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" id="filter" placeholder="Nome" class="form-control col-md-4 ">
                <button type="submit" class="btn btn-dark ml-2" title="Filtrar">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning" title="Ver">Ver</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success" title="Editar">Editar</a>
                                <a href="{{ route('users.roles', $user->id) }}" class="btn btn-info" title="Cargos"><i class="fas fa-address-card"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
