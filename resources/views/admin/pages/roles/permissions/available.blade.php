@extends('adminlte::page')

@section('title', 'Permissões disponíveis do cargo {{ $role->name }}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" data-toggle="tooltip" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}" data-toggle="tooltip" title="Cargos">Cargos</a></li>
    </ol>
@stop

@section('content')
    <h3>Permissões disponíveis do cargo: <strong>{{ $role->name }}</strong></h3>

    <div class="card">
       <div class="card-header">
            <form action="{{ route('roles.permissions.available', $role->id) }}" method="POST" class="for form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control">
                <button type="submit" class="btn btn-dark ml-2" data-toggle="tooltip" title="Filtrar">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">
                            <input type="checkbox" id="check-all" title="Marcar/Desmarcar Tudo">
                        </th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('roles.permissions.attach', $role->id) }}" method="POST">
                        @csrf

                        @foreach($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" class="checks" name="permissions[]" value="{{ $permission->id }}">
                                </td>
                                <td>
                                    {{ $permission->name }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')
                                <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Vincular">Vincular</button>
                            </td>
                        </tr>
                    </form>
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
