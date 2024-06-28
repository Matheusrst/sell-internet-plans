<!-- resources/views/customer_plans.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Planos Disponíveis') }}</div>

                <div class="card-body">
                    @foreach($plans as $plan)
                        <div class="plan-item">
                            <h3>{{ $plan->name }}</h3>
                            <p>{{ $plan->description }}</p>
                            <p>Preço: R$ {{ $plan->price }}</p>
                            <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-info">Ver Detalhes</a>
                            <a href="{{ route('sales.create', $plan->id) }}" class="btn btn-primary">Comprar</a>
                        </div>
                        <hr>
                    @endforeach
                </div>
                <a href="{{ route('home.menu') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
