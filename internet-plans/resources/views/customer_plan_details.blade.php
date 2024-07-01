<!-- detalhes de planos listados para o usuário -->
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

                    @if ($plan->subPlans->isNotEmpty())
                        <h3>Sub-Planos Disponíveis</h3>
                        <ul>
                            @foreach ($plan->subPlans as $subPlan)
                                <li>
                                    <h4>{{ $subPlan->name }}</h4>
                                    <p>{{ $subPlan->description }}</p>
                                    <p>Preço: R$ {{ $subPlan->price }}</p>
                                    <p>Velocidade: {{ $subPlan->speed }}</p>
                                    <a href="{{ route('subplans.show', $subPlan->id) }}" class="btn btn-primary">Ver Detalhes</a>
                                    <form action="{{ route('subplans.purchase', $subPlan->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Comprar Sub-Plano</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <a href="{{ route('sales.create', $plan->id) }}" class="btn btn-primary">Comprar Plano Base</a>
                    <a href="{{ route('plans.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
