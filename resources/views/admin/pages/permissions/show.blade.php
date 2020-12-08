@extends('adminlte::page')

@section('title', 'Detalhes da Permissão')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}" title="Permissões">Permissões</a></li>
</ol>
<br>
    <h1>Detalhes da Permissão: <b>{{ $permission->name }}</b>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $permission->name }}
                </li>
                <li>
                    <strong>Description: </strong> {{ $permission->description }}
                </li>
            </ul>

            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" title="Excluir Permissão">Excluir Permissão</button>
            </form>
        </div>
    </div>
@endsection
