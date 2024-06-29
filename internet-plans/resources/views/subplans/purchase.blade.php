<!-- resources/views/subplans/purchase.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $subPlan->name }}</div>

                <div class="card-body">
                    <p>{{ $subPlan->description }}</p>
                    <p>Preço: R$ {{ $subPlan->price }}</p>
                    <p>Velocidade: {{ $subPlan->speed }}</p>
                    <form action="{{ route('subplans.purchase.store', $subPlan->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Comprar Sub-Plano</button>
                    </form>
                    <a href="{{ route('plans.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
