@extends('adminlte::page')

@section('title', 'Editar Permissão')

@section('content_header')
    <h1>Editar Permissão</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pemissions.update', $permission->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.pemissions.partials.form')
            </form>
        </div>
    </div>
@endsection

