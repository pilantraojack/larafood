@extends('adminlte::page')

@section('title', "Cargos do usuário")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}" title="Usuários">Usuários</a></li>
    </ol>
@stop

@section('content')
    <h3>Cargos do usuário<strong>: {{ $user->name }}</strong></h3>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-dark" title="Novo Cargo">Novo Cargo</a>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th scope="col"><center>Ações</center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('users.role.detach', [$user->id, $role->id]) }}" class="btn btn-warning">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $roles->appends($filters)->links() !!}
            @else
                {!! $roles->links() !!}
            @endif
        </div>
    </div>
@endsection
