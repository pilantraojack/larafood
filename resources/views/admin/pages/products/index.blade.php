@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.index') }}" class="active" title="Produtos">Produtos</a></li>
    </ol>
@stop

@section('content')
    <h3>Listagem dos Produtos</h3>

    <div class="card">
        <div class="card-header">
            <a class="btn btn-dark mb-2" href="{{ route('products.create') }}" title="Novo Produto">Novo Produto</a>
            <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" id="filter" placeholder="Nome" class="form-control col-md-4 ">
                <button type="submit" class="btn btn-dark ml-2" title="Filtrar">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Título</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                @if($product->image)
                                    <img src="{{ url("storage/$product->image") }}" width="50" height="50" alt="Image">
                                @else
                                    {{ '-' }}
                                @endif
                            </td>
                            <td>{{ $product->title }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('products.categories', $product->id) }}" class="btn btn-warning" title="Categorias"><i class="fas fa-layer-group"></i></a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info" title="Editar">Editar</a>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-success" title="Detalhes">Detalhes</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
