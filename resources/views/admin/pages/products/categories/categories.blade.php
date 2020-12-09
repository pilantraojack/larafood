@extends('adminlte::page')

@section('title', "Categorias do produto")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}" title="Produtos">Produtos</a></li>
    </ol>
@stop

@section('content')
    <h3>Categorias do Produto: <strong>{{ $product->title }}</strong></h3>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('products.categories.available', $product->id) }}" title="Nova Categoria" class="btn btn-dark">Nova Categoria</a>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th scope="col"><center>Ações</center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('products.categories.detach', [$product->id, $category->id]) }}" class="btn btn-warning">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif
        </div>
    </div>
@endsection
