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
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Tenant</h3>
                </div>
                <div class="card-body d-flex justify-content-between">
                    <div class="col-6">
                        <label for="plano" class="label-desc">Plano</label>
                        <p class="text-desc"> {{ $tenant->plan->name ?? 'uninformed' }}</p>

                        <label for="name" class="label-desc">Nome</label>
                        <p class="text-desc"> {{ $tenant->name ?? 'uninformed' }}</p>

                        <label for="url">Url</label>
                        <p class="text-desc"> {{ $tenant->url ?? 'uninformed' }}</p>

                        <label for="logo" class="label-desc"></label>
                        <p><img src="{{ url("storage/$tenant->logo") }}" width="50" height="50" alt="Image"></p>
                    </div>
                    <div class="col-6">
                        <label for="email" class="label-desc">Email</label>
                        <p class="text-desc"> {{ $tenant->email ?? 'uninformed' }}</p>

                        <label for="cnpj">CNPJ</label>
                        <p class="text-desc"> {{ $tenant->cnpj ?? 'uninformed' }}</p>

                        <label for="ativo" class="label-desc">Ativo</label>
                        <p class="text-desc"> {{ $tenant->active == 'Y' ? 'SIM' : 'NÃO' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Assinatura</h3>
                </div>
                <div class="card-body d-flex justify-content-between">
                    <div class="col-6">
                        <label for="sub" class="label-desc">Assinatura</label>
                        <p class="text-desc"> {{ $tenant->subscription->format('d/m/y') ?? 'uninformed' }}</p>

                        <label for="expire" class="label-desc">Expira em</label>
                        <p class="text-desc"> {{ $tenant->expires_at->format('d/m/y') ?? 'uninformed' }}</p>

                        <label for="id" class="label-desc">Id</label>
                        <p class="text-desc"> {{ $tenant->sub_id ?? 'uninformed' }}</p>
                    </div>
                    <div class="col-6">
                        <label for="active" class="label-desc">Ativo ?</label>
                        <p class="text-desc"> {{ $tenant->sub_active ? 'SIM' : 'NÃO' }}</p>

                        <label for="suspended">Cancelou ?</label>
                        <p class="text-desc"> {{ $tenant->sub_suspended ? 'SIM' : 'NÃO' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
