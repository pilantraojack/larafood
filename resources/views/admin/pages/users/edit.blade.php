@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" title="Usuários" class="active">Usuários</a></li>
    </ol>
    <br>
    <h1>Editar Usuário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.users._partials.form')
            </form>
        </div>
    </div>
@endsection

