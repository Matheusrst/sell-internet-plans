<!-- view de confirmação de compra -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirmar Compra') }}</div>

                <div class="card-body">
                    <h3>{{ $plan->name }}</h3>
                    <p>{{ $plan->description }}</p>
                    <p>Preço Base: R$ {{ $plan->base_price }}</p>
                    <p>Velocidade Base: {{ $plan->base_speed }}</p>
                    
                    <form method="POST" action="{{ route('sales.store', $plan->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Confirmar Compra</button>
                        <a href="{{ route('plans.index', $plan->id) }}" class="btn btn-primary">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
