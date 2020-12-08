@extends('adminlte::page')

@section('name', 'Tenants')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" data-toggle="tooltip" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tenants.index') }}" data-toggle="tooltip" title="Tenants" class="active">Tenants</a></li>
    </ol>
@stop

@section('content')
    <h3>Listagem dos Tenants</h3>

    <div class="card">
        <div class="card-header">
            <a class="btn btn-dark mb-2" href="{{ route('tenants.create') }}" data-toggle="tooltip" title="Novo Tenant">Novo Tenant</a>
            <form action="{{ route('tenants.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" id="filter" placeholder="Nome" class="form-control col-md-4 ">
                <button type="submit" class="btn btn-dark ml-2" data-toggle="tooltip" title="Filtrar">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td>
                                @if($tenant->logo)
                                    <img src="{{ url("storage/$tenant->logo") }}" width="50" height="50" alt="Image">
                                @else
                                    {{ '-' }}
                                @endif
                            </td>
                            <td>{{ $tenant->name }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-info" data-toggle="tooltip" title="Editar">Editar</a>

                                <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-success" data-toggle="tooltip" title="Detalhes">Detalhes</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
