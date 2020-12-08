@extends('adminlte::page')

@section('title', "Categorias do produto")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}" title="Planos">Planos</a></li>
    </ol>
    <br>
    <h1>Categorias do Produto: <strong>{{ $product->title }}</strong></h1>
    <hr>
    <a href="{{ route('products.categories.available', $product->id) }}" title="Nova Categoria" class="btn btn-dark">Nova Categoria</a>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td style="width=10px;">
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
