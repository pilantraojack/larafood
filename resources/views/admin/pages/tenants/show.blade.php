@extends('adminlte::page')

@section('name', 'Detalhes do Tenant')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" data-toggle="tooltip" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tenants.index') }}" data-toggle="tooltip" title="Tenants" class="active">Tenants</a></li>
    </ol>
    <br>
    <h1>Detalhes do Tenant: <b>{{ $tenant->name }}</b>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <img src="{{ url("storage/$tenant->logo") }}" width="50" height="50" alt="Image">
            <ul>
                <li>
                    <strong>Plano: </strong> {{ $tenant->plan->name }}
                </li>
                <li>
                    <strong>Nome: </strong> {{ $tenant->name }}
                </li>
                <li>
                    <strong>Url: </strong> {{ $tenant->url }}
                </li>
                <li>
                    <strong>E-mail: </strong> {{ $tenant->email }}
                </li>
                <li>
                    <strong>CNPJ: </strong> {{ $tenant->cnpj }}
                </li>
                <li>
                    <strong>Ativo: </strong> {{ $tenant->active == 'Y' ? 'SIM' : 'NÃO' }}
                </li>
            </ul>

            <hr>
            <h3>Assinatura</h3>
            <ul>
                <li>
                    <strong>Data Assinatura: </strong> {{ $tenant->subscription }}
                </li>
                <li>
                    <strong>Expira em: </strong> {{ $tenant->expires_at }}
                </li>
                <li>
                    <strong>Id: </strong> {{ $tenant->sub_id }}
                </li>
                <li>
                    <strong>Ativo ?: </strong> {{ $tenant->sub_active ? 'SIM' : 'NÃO' }}
                </li>
                <li>
                    <strong>Cancelou ?: </strong> {{ $tenant->sub_suspended ? 'SIM' : 'NÃO' }}
                </li>
            </ul>
        </div>
    </div>
@endsection
