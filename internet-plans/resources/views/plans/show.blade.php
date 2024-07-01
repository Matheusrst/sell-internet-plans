<!-- menu de informações de planos criados -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $plan->name }}</h1>
    <p>{{ $plan->description }}</p>
    <p>Preço Base: {{ $plan->base_price }}</p>
    <p>Velocidade Base: {{ $plan->base_speed }}</p>

    <h3>Sub-Planos</h3>
    @if($plan->subPlans->isEmpty())
        <p>Não há sub-planos disponíveis para este plano.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Velocidade</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plan->subPlans as $subPlan)
                <tr>
                    <td>{{ $subPlan->name }}</td>
                    <td>{{ $subPlan->price }}</td>
                    <td>{{ $subPlan->speed }}</td>
                    <td>{{ $subPlan->description }}</td>
                    <td>
                        <a href="{{ route('subplans.edit', ['plan' => $plan->id, 'subplan' => $subPlan->id]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('subplans.destroy', ['plan' => $plan->id, 'subplan' => $subPlan->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('subplans.create', $plan->id) }}" class="btn btn-primary">Adicionar Sub-Plano</a>
    <a href="{{ route('plans.index', $plan->id) }}" class="btn btn-primary">Voltar</a>
</div>
@endsection
