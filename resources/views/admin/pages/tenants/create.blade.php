@extends('adminlte::page')

@section('title', 'Novo Tenant')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" data-toggle="tooltip" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tenants.index') }}" data-toggle="tooltip" title="Tenants" class="active">Tenants</a></li>
    </ol>
@stop

@section('content')
    <h3>Novo Tenant</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tenants.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.pages.tenants._partials.form')
            </form>
        </div>
    </div>
@endsection
