@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" data-toggle="tooltip" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" data-toggle="tooltip" title="Perfis" class="active">Perfis</a></li>
    </ol>
    <br>
    <h3>Editar Perfil</h3>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.profiles.partials.form')
            </form>
        </div>
    </div>
@endsection

