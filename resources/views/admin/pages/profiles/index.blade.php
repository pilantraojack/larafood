@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" data-toggle="tooltip" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" data-toggle="tooltip" title="Perfis" class="active">Perfis</a></li>
    </ol>
@stop

@section('content')
    <h3>Listagem dos Perfis</h3>

    <div class="card">
        <div class="card-header">
            <a class="btn btn-dark mb-2" href="{{ route('profiles.create') }}"  data-toggle="tooltip" title="Novo Perfil">Novo Perfil</a>
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
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
                        <th scope="col"><center>Ações</center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-primary mr-2" data-toggle="tooltip" title="Detalhes"><i class="fas fa-search"></i></a>

                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info mr-2" data-toggle="tooltip" title="Editar"><i class="fas fa-pen"></i></a>

                                <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-warning mr-2" data-toggle="tooltip" title="Permissões"><i class="fas fa-lock"></i></a>

                                <a href="{{ route('profiles.plans', $profile->id) }}" class="btn btn-dark" data-toggle="tooltip" title="Planos"><i class="fas fa-list-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@endsection
