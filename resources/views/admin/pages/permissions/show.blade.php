@extends('adminlte::page')

@section('title', 'Detalhes da Permissão')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}" title="Permissões">Permissões</a></li>
    </ol>
@stop

@section('content')
    <h3>Detalhes da Permissão: <b>{{ $permission->name }}</b></h3>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="col-6">
                        <label for="name" class="label-desc">Name</label>
                        <p class="text-desc"> {{ $permission->name ?? 'uninformed' }}</p>
                    </div>
                    <div class="col-6">
                        <label for="description">Description</label>
                        <p class="text-desc"> {{ $permission->description ?? 'uninformed' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 d-flex">
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Excluir Cargo"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
