@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tables.index') }}" class="active">Mesas</a></li>
    </ol>
@stop

@section('content')
    <p>Listagem dos Mesas</p>

    <div class="card">
        <div class="card-header">
            <a class="btn btn-dark mb-2" href="{{ route('tables.create') }}">Nova Mesa</a>
            <form action="{{ route('tables.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" id="filter" placeholder="Nome" class="form-control col-md-4 ">
                <button type="submit" class="btn btn-dark ml-2">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Identify</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $table)
                        <tr>
                            <td>{{ $table->identify }}</td>
                            <td>{{ $table->description }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('tables.show', $table->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-success">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
