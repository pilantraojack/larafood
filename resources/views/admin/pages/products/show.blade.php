@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.index') }}" class="active" title="Produtos">Produtos</a></li>
    </ol>
    <br>
    <h1>Detalhes do Produto<b>: {{ $product->name }}</b>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <img src="{{ url("storage/$product->image") }}" width="50" height="50" alt="Image">
            <ul>
                <li>
                    <strong>Título: </strong> {{ $product->title }}
                </li>
                <li>
                    <strong>Flag: </strong> {{ $product->flag }}
                </li>
            </ul>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" title="Excluir">Excluir</button>
            </form>
        </div>
    </div>
@endsection
