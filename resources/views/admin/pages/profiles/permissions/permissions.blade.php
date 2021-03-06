@extends('adminlte::page')

@section('title', "Permissões do perfil")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" data-toggle="tooltip" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}" data-toggle="tooltip" title="Perfis">Perfis</a></li>
    </ol>
@stop

@section('content')
    <h3>Permissões do perfil <strong>{{ $profile->name }}</strong></h3>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark" data-toggle="tooltip" title="Nova Permissão">Nova Permissão</a>
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
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('profiles.permission.detach', [$profile->id, $permission->id]) }}" class="btn btn-warning" data-toggle="tooltip" title="Desvincular">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@endsection
