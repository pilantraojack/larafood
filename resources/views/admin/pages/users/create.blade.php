@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" title="Usuários" class="active">Usuários</a></li>
    </ol>
@stop

@section('content')
    <h3>Novo Usuário</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.users._partials.form')
            </form>
        </div>
    </div>
@endsection
