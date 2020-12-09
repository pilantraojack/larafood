@extends('adminlte::page')

@section('title', 'Detalhes do Usuário')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" title="Usuários" class="active">Usuários</a></li>
    </ol>
@stop

@section('content')
    <h3>Detalhes do Usuário: <b>{{ $user->name }}</b></h3>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="col-6">
                        <label for="name" class="label-desc">Name</label>
                        <p class="text-desc"> {{ $user->name ?? 'uninformed' }}</p>

                        <label for="empresa" class="label-desc">Empresa</label>
                        <p class="text-desc"> {{ $user->tenant->name ?? 'uninformed' }}</p>
                    </div>
                    <div class="col-6">
                        <label for="email">Description</label>
                        <p class="text-desc"> {{ $user->email ?? 'uninformed' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 d-flex">
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Excluir Usuário"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
