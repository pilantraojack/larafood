@extends('adminlte::page')

@section('title', 'Detalhes da Categoria')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}" title="Categorias" class="active">Categorias</a></li>
    </ol>
    <br>
    <h1>Detalhes da Categoria: <b>{{ $category->name }}</b>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="col-6">
                        <label for="name" class="label-desc">Name</label>
                        <p class="text-desc"> {{ $category->name ?? 'uninformed' }}</p>

                        <label for="url" class="label-desc">Url</label>
                        <p class="text-desc"> {{ $category->url ?? 'uninformed' }}</p>
                    </div>
                    <div class="col-6">
                        <label for="description">Description</label>
                        <p class="text-desc"> {{ $category->description ?? 'uninformed' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 d-flex">
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Excluir Categoria"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
