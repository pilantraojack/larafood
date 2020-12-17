@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard" >Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}" title="Planos" class="active">Planos</a></li>
    </ol>
@stop

@section('content')
    <h3>Listagem dos Planos</h3>

    <div class="card">
        <div class="card-header">
            <a class="btn btn-dark mb-2" href="{{ route('plans.create') }}" title="Novo Plano">Novo Plano</a>
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control col-md-4 ">
                <button type="submit" class="btn btn-dark ml-2" title="Filtrar">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th scope="col"><center>Ações</center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                                R$ {{ number_format($plan->price, 2, ",", ".") }}
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('plans.show', $plan->url) }}" title="Detalhes" class="btn btn-primary mr-2"><i class="fas fa-search"></i></a>
                                <a href="{{ route('plans.edit', $plan->url) }}" title="Editar" class="btn btn-info mr-2"><i class="fas fa-pen"></i></a>
                                <a href="{{ route('plans.profiles', $plan->id) }}" title="Perfis do Plano" class="btn btn-secondary mr-2"><i class="fas fa-address-book"></i> </a>
                                <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-primary" title="Detalhes do Plano">Detalhes</a>
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
