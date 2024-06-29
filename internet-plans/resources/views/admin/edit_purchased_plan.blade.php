<!-- resources/views/admin/edit_purchased_plan.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Plano Comprado</h1>

    <form method="POST" action="{{ route('admin.update.purchased.plan', $sale->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $sale->price }}" required>
        </div>

        <div class="form-group">
            <label for="speed">Velocidade</label>
            <input type="text" class="form-control" id="speed" name="speed" value="{{ $sale->speed }}" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('admin.customer.purchased.plans', $sale->user_id) }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
