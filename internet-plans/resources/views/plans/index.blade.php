@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Planos</h1>
    <a href="{{ route('plans.create') }}" class="btn btn-primary mb-3">Criar Novo Plano</a>

    @if($plans->isEmpty())
        <p>Não há planos disponíveis.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço Base</th>
                    <th>Velocidade Base</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plans as $plan)
                <tr>
                    <td>{{ $plan->name }}</td>
                    <td>{{ $plan->base_price }}</td>
                    <td>{{ $plan->base_speed }}</td>
                    <td>
                        <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-info">Visualizar</a>
                        <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home.menu', $plan->id) }}" class="btn btn-primary">Voltar</a>
    @endif
</div>
@endsection
