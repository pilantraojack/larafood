@extends('adminlte::page')

@section('title', 'Novo Plano')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}" title="Planos" class="active">Planos</a></li>
    </ol>
@stop

@section('content')
    <h3>Novo Plano</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@endsection
