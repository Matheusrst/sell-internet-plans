<!-- resources/views/plans/purchased_plans.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Meus Planos Comprados</div>

                <div class="card-body">
                    @if($plans->isEmpty())
                        <p>Você não comprou nenhum plano.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Velocidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plans as $plan)
                                <tr>
                                    <td>{{ $plan->id }}</td>
                                    <td>{{ $plan->name }}</td>
                                    <td>{{ $plan->description }}</td>
                                    <td>{{ $plan->base_price }}</td>
                                    <td>{{ $plan->base_speed }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <a href="{{ route('home.menu') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
