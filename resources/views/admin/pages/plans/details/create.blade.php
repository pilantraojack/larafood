@extends('adminlte::page')

@section('title', "Adicionar novo detalhe ao plano: {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard" >Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}" title="Planos">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}" title="Detalhes do Plano">Detalhes do Plano</a></li>
    </ol>
    <br>
    <h1>Adicionar novo detalhe ao plano: {{ $plan->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.plan.store', $plan->url) }}" method="post">
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@endsection
