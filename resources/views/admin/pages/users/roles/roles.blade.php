@extends('adminlte::page')

@section('title', "Cargos do usuário")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}" title="Usuários">Usuários</a></li>
    </ol>
    <br>
    <h1>Cargos do usuário<strong>: {{ $user->name }}</strong></h1>
    <hr>
    <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-dark" title="Novo Cargo">Novo Cargo</a>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td style="width=10px;">
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
