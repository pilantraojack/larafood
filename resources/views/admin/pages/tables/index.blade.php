@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tables.index') }}" title="Mesas" class="active">Mesas</a></li>
    </ol>
@stop

@section('content')
    <h3>Listagem das Mesas</h3>

    <div class="card">
        <div class="card-header">
            <a class="btn btn-dark mb-2" href="{{ route('tables.create') }}" title="Nova Mesa">Nova Mesa</a>
            <form action="{{ route('tables.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" id="filter" placeholder="Nome" class="form-control col-md-4 ">
                <button type="submit" class="btn btn-dark ml-2" title="Filtrar">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th scope="col"><center>Ações</center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $table)
                        <tr>
                            <td>{{ $table->identify }}</td>
                            <td>{{ $table->description }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('tables.show', $table->id) }}" class="btn btn-primary mr-2" title="Detalhes"><i class="fas fa-search"></i></a>
                                <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-info" title="Editar"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
