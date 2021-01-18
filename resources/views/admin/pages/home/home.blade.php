@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon">
                    <a class="text-dark" href="{{ route('users.index') }}"><i class="fas fa-users"></i></a>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text"><a class="text-dark font-weight-bold" href="{{ route('users.index') }}">Usuários</a></span>
                    <span class="info-box-number">{{ $totalUsers }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <a class="text-dark" href="{{ route('tables.index') }}"><i class="fas fa-tablet"></i></a>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text"><a class="text-dark font-weight-bold" href="{{ route('tables.index') }}">Mesas</a></span>
                    <span class="info-box-number">{{ $totalTables }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <a class="text-dark" href="{{ route('categories.index') }}"><i class="fas fa-layer-group"></i></a>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text"><a class="text-dark font-weight-bold" href="{{ route('categories.index') }}">Categorias</a></span>
                    <span class="info-box-number">{{ $totalCategories }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <a class="text-dark" href="{{ route('products.index') }}"><i class="fas fa-briefcase"></i></a>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text"><a class="text-dark font-weight-bold" href="{{ route('products.index') }}">Produtos</a></span>
                    <span class="info-box-number">{{ $totalProducts }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <a class="text-dark" href="{{ route('tenants.index') }}"><i class="fas fa-building"></i></a>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text"><a class="text-dark font-weight-bold" href="{{ route('tenants.index') }}">Empresas</a></span>
                    <span class="info-box-number">{{ $totalTenants }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <a class="text-dark" href="{{ route('plans.index') }}"><i class="fas fa-list-alt"></i></a>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text"><a class="text-dark font-weight-bold" href="{{ route('plans.index') }}">Planos</a></span>
                    <span class="info-box-number">{{ $totalPlans }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <a class="text-dark" href="{{ route('roles.index') }}"><i class="fas fa-address-card"></i></a>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text"><a class="text-dark font-weight-bold" href="{{ route('roles.index') }}">Cargos</a></span>
                    <span class="info-box-number">{{ $totalRoles }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <a class="text-dark" href="{{ route('profiles.index') }}"><i class="fas fa-id-badge"></i></a>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text"><a class="text-dark font-weight-bold" href="{{ route('profiles.index') }}">Perfis</a></span>
                    <span class="info-box-number">{{ $totalProfiles }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua">
                    <a class="text-dark" href="{{ route('permissions.index') }}"><i class="fas fa-lock"></i></a>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text"><a class="text-dark font-weight-bold" href="{{ route('permissions.index') }}">Permissões</a></span>
                    <span class="info-box-number">{{ $totalPermissions }}</span>
                </div>
            </div>
        </div>
    </div>
@stop
