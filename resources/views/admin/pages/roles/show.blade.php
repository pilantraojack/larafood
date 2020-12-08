@extends('adminlte::page')

@section('title', 'Detalhes do Cargo')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" data-toggle="tooltip" title="Dashboard" >Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" data-toggle="tooltip" title="Cargos" class="active">Cargos</a></li>
    </ol>
    <br>
    <h1>Detalhes do Cargo: <b>{{ $role->name }}</b>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $role->name }}
                </li>
                <li>
                    <strong>Description: </strong> {{ $role->description }}
                </li>
            </ul>

            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Deletar Cargo">Deletar Cargo</button>
            </form>
        </div>
    </div>
@endsection
