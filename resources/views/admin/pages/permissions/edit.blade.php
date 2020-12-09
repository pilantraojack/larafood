@extends('adminlte::page')

@section('title', 'Editar Permissão')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}" title="Permissões">Permissões</a></li>
    </ol>
@stop

@section('content')
    <h3>Editar Permissão</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.permissions.partials.form')
            </form>
        </div>
    </div>
@endsection

