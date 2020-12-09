@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard" >Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}" title="Planos" class="active">Planos</a></li>
    </ol>
@stop

@section('content')
    <h3>Detalhes do Plano: <b>{{ $plan->name }}</b></h3>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="col-6">
                        <label for="name" class="label-desc">Name</label>
                        <p class="text-desc"> {{ $plan->name ?? 'uninformed' }}</p>

                        <label for="url">Url</label>
                        <p class="text-desc"> {{ $plan->url ?? 'uninformed' }}</p>

                    </div>
                    <div class="col-6">
                        <label for="price">Preço</label>
                        <p class="text-desc"> {{ $plan->price ?? 'uninformed' }}</p>

                        <label for="desciption">Description</label>
                        <p class="text-desc"> {{ $plan->description ?? 'uninformed' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 d-flex">
                            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Deletar Plano"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
