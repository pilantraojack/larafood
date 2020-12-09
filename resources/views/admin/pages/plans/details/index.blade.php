@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" title="Dashboard" >Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}" title="Planos" >Planos</a></li>
    </ol>
@stop

@section('content')
    <h3>Detalhes do Plano: {{ $plan->name }}</h3>

    <div class="card">
        <div class="card-header">
            <a class="btn btn-dark mb-2" href="{{ route('details.plan.create', $plan->url) }}" title="Adicionar Detalhe">Novo Detalhe</a>
        </div>
        <div class="card-body">
            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>
                                {{ $detail->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-success" title="Editar" >Editar</a>
                                <a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}" class="btn btn-warning" title="Detalhes" >Detalhes</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
        </div>
    </div>
@endsection
