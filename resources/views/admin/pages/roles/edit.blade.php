@extends('adminlte::page')

@section('title', 'Editar Cargo')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" data-toggle="tooltip" title="Dashboard" >Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}" data-toggle="tooltip" title="Cargos" class="active">Cargos</a></li>
    </ol>
@stop

@section('content')
    <h3>Editar Cargo</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.roles.partials.form')
            </form>
        </div>
    </div>
@endsection

