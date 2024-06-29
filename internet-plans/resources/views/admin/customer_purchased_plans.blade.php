<!-- resources/views/admin/customer_purchased_plans.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Planos Comprados por {{ $user->name }}</h1>

    @if($sales->isEmpty())
        <p>Este cliente não comprou nenhum plano.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Velocidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->plan ? $sale->plan->name : $sale->subPlan->name }}</td>
                    <td>{{ $sale->plan ? $sale->plan->description : $sale->subPlan->description }}</td>
                    <td>{{ $sale->price }}</td>
                    <td>{{ $sale->speed }}</td>
                    <td>
                        <a href="{{ route('admin.edit.purchased.plan', $sale->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja cancelar este plano?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Cancelar</button>
                        </form> 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a href="{{ route('admin.customers.index') }}" class="btn btn-primary">Voltar</a>
</div>
@endsection
