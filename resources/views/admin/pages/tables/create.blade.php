@extends('adminlte::page')

@section('title', 'Nova Mesa')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tables.index') }}" title="Mesas" class="active">Mesas</a></li>
    </ol>
@stop

@section('content')
    <h3>Nova Mesa</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tables.store') }}" class="form" method="POST">
                @csrf
                @include('admin.pages.tables._partials.form')
            </form>
        </div>
    </div>
@endsection
