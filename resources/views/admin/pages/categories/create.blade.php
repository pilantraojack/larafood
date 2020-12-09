@extends('adminlte::page')

@section('title', 'Nova Categoria')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}" title="Categorias" class="active">Categorias</a></li>
    </ol>
@stop

@section('content')
    <h3>Nova Categoria</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" class="form" method="POST">
                @csrf
                @include('admin.pages.categories._partials.form')
            </form>
        </div>
    </div>
@endsection
