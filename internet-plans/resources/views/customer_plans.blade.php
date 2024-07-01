<!-- listagem de planos disponiveis -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Planos Disponíveis</div>

                <div class="card-body">
                    @if($plans->isEmpty())
                        <p>Não há planos disponíveis no momento.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Preço Base</th>
                                    <th>Velocidade Base</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plans as $plan)
                                    <tr>
                                        <td>{{ $plan->name }}</td>
                                        <td>{{ $plan->description }}</td>
                                        <td>R$ {{ $plan->base_price }}</td>
                                        <td>{{ $plan->base_speed }}</td>
                                        <td>
                                            <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-primary">Ver Detalhes</a>
                                        </td>
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