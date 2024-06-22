<!-- resources/views/customer_plan_details.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detalhes do Plano') }}</div>

                <div class="card-body">
                    <h3>{{ $plan->name }}</h3>
                    <p>{{ $plan->description }}</p>
                    <p>Preço: R$ {{ $plan->price }}</p>
                    <a href="{{ route('sales.create', $plan->id) }}" class="btn btn-primary">Comprar</a>
                    <a href="{{ route('plans.index', $plan->id) }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
