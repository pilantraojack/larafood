@extends('adminlte::page')

@section('title', 'Detalhes do Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" data-toggle="tooltip" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" data-toggle="tooltip" title="Perfis" class="active">Perfis</a></li>
    </ol>
@stop

@section('content')
    <h3>Detalhes do Perfil: <b>{{ $profile->name }}</b></h3>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="col-6">
                        <label for="name" class="label-desc">Name</label>
                        <p class="text-desc"> {{ $profile->name ?? 'uninformed' }}</p>
                    </div>
                    <div class="col-6">
                        <label for="description">Description</label>
                        <p class="text-desc"> {{ $profile->description ?? 'uninformed' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 d-flex">
                            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Excluir Perfil"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
