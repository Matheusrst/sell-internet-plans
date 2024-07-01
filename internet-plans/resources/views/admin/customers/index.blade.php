<!-- view de usuarios cadastrados para o admin -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Clientes</h1>

    @if($customers->isEmpty())
        <p>Não há clientes cadastrados.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>
                        <a href="{{ route('admin.customer.purchased.plans', $customer->id) }}" class="btn btn-primary">Ver Planos Comprados</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home.menu') }}" class="btn btn-primary">Voltar</a>
    @endif
</div>
@endsection
