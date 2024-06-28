@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Sub-Plano ao Plano: {{ $plan->name }}</h1>

    <form action="{{ route('subplans.store', $plan->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome do Sub-Plano</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" class="form-control" id="price" name="price" required min="0" step="0.01">
        </div>
        <div class="form-group">
            <label for="speed">Velocidade</label>
            <input type="text" class="form-control" id="speed" name="speed" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Sub-Plano</button>
    </form>
    <a href="{{ route('plans.index') }}" class="btn btn-primary">Voltar</a>
</div>
@endsection
