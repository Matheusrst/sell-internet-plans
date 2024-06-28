<!-- resources/views/costumer_plans_details.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $plan->name }}</div>

                <div class="card-body">
                    <p>{{ $plan->description }}</p>
                    <p>Preço Base: R$ {{ $plan->base_price }}</p>
                    <p>Velocidade Base: {{ $plan->base_speed }}</p>

                    <!-- Se houver sub-planos, exibir detalhes -->
                    @if ($plan->subPlans->isNotEmpty())
                        <h3>Opções de planos disponiveis!</h3>
                        <ul>
                            @foreach ($plan->subPlans as $subPlan)
                                <li>
                                    <h4>{{ $subPlan->name }}</h4>
                                    <p>{{ $subPlan->description }}</p>
                                    <p>Preço: R$ {{ $subPlan->price }}</p>
                                    <p>Velocidade: {{ $subPlan->speed }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <a href="{{ route('sales.create', $plan->id) }}" class="btn btn-primary">Comprar</a>
                    <a href="{{ route('plans.index') }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
