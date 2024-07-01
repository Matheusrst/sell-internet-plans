<!-- menu principal para admin e usuarios -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu Principal</div>

                <div class="card-body">
                    @if (auth()->user()->user_type == 'admin')
                        <a href="{{ route('plans.index') }}" class="btn btn-primary mb-3">Gerenciar Planos</a>
                        <a href="{{ route('maintenances.index') }}" class="btn btn-primary mb-3">Gerenciar Manutenções</a>
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-primary mb-3">Ver Planos Comprados</a>
                    @elseif (auth()->user()->user_type == 'customer')
                        <a href="{{ route('plans.index') }}" class="btn btn-primary mb-3">Ver Planos</a>
                        <a href="{{ route('maintenances.customer') }}" class="btn btn-primary mb-3">Minhas Manutenções</a>
                        <a href="{{ route('plans.purchased') }}" class="btn btn-primary mb-3">Meus Planos Comprados</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
