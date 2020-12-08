@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}" title="Categorias" class="active">Categorias</a></li>
    </ol>
    <br>
    <h1>Editar Categoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.categories._partials.form')
            </form>
        </div>
    </div>
@endsection

