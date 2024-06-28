@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Sub-Plano: {{ $subPlan->name }}</h1>

    <form action="{{ route('subplans.update', ['plan' => $plan->id, 'subplan' => $subPlan->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome do Sub-Plano</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $subPlan->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description">{{ $subPlan->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $subPlan->price }}" required min="0" step="0.01">
        </div>
        <div class="form-group">
            <label for="speed">Velocidade</label>
            <input type="text" class="form-control" id="speed" name="speed" value="{{ $subPlan->speed }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
@endsection
