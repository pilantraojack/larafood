@extends('adminlte::page')

@section('title', 'Detalhes do Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" data-toggle="tooltip" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" data-toggle="tooltip" title="Perfis" class="active">Perfis</a></li>
    </ol>
    <br>
    <h1>Detalhes do Perfil: <b>{{ $profile->name }}</b>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $profile->name }}
                </li>
                <li>
                    <strong>Description: </strong> {{ $profile->description }}
                </li>
            </ul>

            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Excluir Perfil">Excluir Perfil</button>
            </form>
        </div>
    </div>
@endsection
