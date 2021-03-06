@extends('site.layouts.app')

@section('content')
    <div class="text-center">
        <h1 class="title-plan">Escolha um plano</h1>
    </div>
    <div class="row">
        @foreach($plans as $plan)
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricing-content">
                        <div class="pricingTable-header">
                            <h3 class="title">{{ $plan->name }}</h3>
                        </div>
                        <div class="inner-content">
                            <div class="price-value">
                                <span class="currency">R$</span>
                                <span class="amount">{{ $plan->price }}</span>
                                <span class="duration">Por Mês</span>
                            </div>
                            @foreach($plan->details as $detail)
                                <ul>
                                    <li>{{ $detail->name }}</li>
                                </ul>
                            @endforeach

                        </div>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="{{ route('plan.subscription', $plan->url) }}">Assinar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
