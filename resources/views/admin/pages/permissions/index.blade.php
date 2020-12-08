@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}" title="Permissões">Permissões</a></li>
    </ol>
    <br>
    <h1>Permissões</h1>
@stop

@section('content')
    <div class="card">
       <div class="card-header">
           <a href="{{ route('permissions.create') }}" title="Nova Permissão" class="btn btn-dark mb-2">Nova Permissão</a>
            <form action="{{ route('permissions.search') }}" method="POST" class="for form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control">
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
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning" title="Detalhes">Detalhes</a>
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-success" title="Editar">Editar</a>
                                <a href="{{ route('permissions.profiles', $permission->id) }}" class="btn btn-info" title="Perfis"><i class="fas fa-id-badge"></i></a>
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
