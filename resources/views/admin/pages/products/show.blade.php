@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.index') }}" class="active" title="Produtos">Produtos</a></li>
    </ol>
@stop

@section('content')
    <h3>Detalhes do Produto<b>: {{ $product->name }}</b></h3>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="col-6">
                        <label for="nome" class="label-desc">Nome</label>
                        <p class="text-desc"> {{ $product->title ?? 'uninformed' }}</p>

                        <label for="image" class="label-desc">Image</label>
                        <p><img src="{{ url("storage/$product->image") }}" width="50" height="50" alt="Image"></p>
                    </div>
                    <div class="col-6">
                        <label for="description">Description</label>
                        <p class="text-desc"> {{ $product->description ?? 'uninformed' }}</p>

                        <label for="price">Price</label>
                        <p class="text-desc">R$ {{ number_format($product->price, 2, ",", ".") ?? 'uninformed' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 d-flex">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Excluir Produto"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
