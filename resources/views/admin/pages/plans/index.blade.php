@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}" class="active">Planos</a></li>
    </ol>
@stop

@section('content')
    <p>Listagem dos Planos</p>

    <div class="card">
        <div class="card-header">
            <a class="btn btn-dark mb-2" href="{{ route('plans.create') }}">Novo Plano</a>
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control col-md-4 ">
                <button type="submit" class="btn btn-dark ml-2">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                                R$ {{$plan->price}}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-primary">Detalhes</a>
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-success">Editar</a>
                                <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-info"><i class="fas fa-address-book"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! $plans->links() !!}
        </div>
    </div>
@stop
