@extends('adminlte::page')

@section('title', "Detalhes do detalhe: {$detail->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard" >Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}" title="Planos" >Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}" title="Detalhes do Plano">Detalhes do Plano</a></li>
        <br>
    </ol>
    <br>
    <h1>Detalhes do detalhe: {{ $detail->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $detail->name }}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" title="Excluir">Exlcuir</button>
            </form>
        </div>
    </div>
@endsection
