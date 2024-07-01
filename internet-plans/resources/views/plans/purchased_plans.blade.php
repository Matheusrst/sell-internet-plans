<!-- view de listagem de planos comprados -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Meus Planos Comprados</div>

                <div class="card-body">
                    @if($sales->isEmpty())
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
                                @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->plan ? $sale->plan->name : $sale->subPlan->name }}</td>
                                    <td>{{ $sale->plan ? $sale->plan->description : $sale->subPlan->description }}</td>
                                    <td>{{ $sale->price }}</td>
                                    <td>{{ $sale->speed }}</td>
                                    <td>
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
                </div>
                <a href="{{ route('home.menu') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
