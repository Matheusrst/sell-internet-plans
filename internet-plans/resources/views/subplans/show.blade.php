<!-- resources/views/plans/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $plan->name }}</h1>
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
                    <form action="{{ route('subplans.buy', $subPlan->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Comprar Sub-Plano</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('plans.buy', $plan->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Comprar Plano Base</button>
    </form>

    <a href="{{ route('plans.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
