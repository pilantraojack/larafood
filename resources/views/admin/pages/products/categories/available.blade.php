@extends('adminlte::page')

@section('title', 'Categorias disponíveis para o produto {{ $product->title }}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}" title="Produtos">Produtos</a></li>
    </ol>
@stop

@section('content')
    <h3>Categorias disponíveis para o produto<strong>: {{ $product->title }}</strong></h3>

    <div class="card">
       <div class="card-header">
            <form action="{{ route('products.categories.available', $product->id) }}" method="POST" class="for form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control">
                <button type="submit" class="btn btn-dark ml-2" title="Filtrar">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">
                            <input type="checkbox" id="check-all" title="Marcar/Desmarcar Tudo">
                        </th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('products.categories.attach', $product->id) }}" method="POST">
                        @csrf

                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <input type="checkbox" class="checks" name="categories[]" value="{{ $category->id }}">
                                </td>
                                <td>
                                    {{ $category->name }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')
                                <button type="submit" class="btn btn-success" title="Vincular">Vincular</button>
                            </td>
                        </tr>
                    </form>
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
