@extends('adminlte::page')

@section('title', 'Editar Empresa')

@section('content_header')
    <h1>Editar Empresa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tenants.update', $tenant->id) }}" class="form" method="POST" enctype="mutipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.pages.tenants._partials.form')
            </form>
        </div>
    </div>
@endsection

