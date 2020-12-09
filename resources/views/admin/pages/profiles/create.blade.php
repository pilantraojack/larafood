@extends('adminlte::page')

@section('title', 'Novo Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" title="Perfis" class="active">Perfis</a></li>
    </ol>
@stop

@section('content')
    <h3>Novo Perfil</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.store') }}" class="form" method="POST">

                @include('admin.pages.profiles.partials.form')
            </form>
        </div>
    </div>
@endsection
