<!-- formulario de criação de planos -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Novo Plano</h1>

    <form action="{{ route('plans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome do Plano</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="base_price">Preço Base</label>
            <input type="number" class="form-control" id="base_price" name="base_price" required min="0" step="0.01">
        </div>
        <div class="form-group">
            <label for="base_speed">Velocidade Base</label>
            <input type="text" class="form-control" id="base_speed" name="base_speed" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Plano</button>
    </form>
    <a href="{{ route('plans.index') }}" class="btn btn-primary">Voltar</a>
</div>
@endsection
