@extends('adminlte::page')

@section('title', 'Novo Cargo')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" data-toggle="tooltip" title="Dashboard" >Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" data-toggle="tooltip" title="Cargos" class="active">Cargos</a></li>
    </ol>
@stop

@section('content')
    <h3>Novo Cargo</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.store') }}" class="form" method="POST">
                @include('admin.pages.roles.partials.form')
            </form>
        </div>
    </div>
@endsection
