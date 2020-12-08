@extends('adminlte::page')

@section('title', 'Detalhes da Mesa')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tables.index') }}" title="Mesas" class="active">Mesas</a></li>
    </ol>
    <br>
    <h1>Detalhes da Mesa<b>: {{ $table->identify }}</b>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Identificador da mesa: </strong> {{ $table->identify }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $table->description }}
                </li>
            </ul>

            <form action="{{ route('tables.destroy', $table->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" title="Excluir">Excluir</button>
            </form>
        </div>
    </div>
@endsection
