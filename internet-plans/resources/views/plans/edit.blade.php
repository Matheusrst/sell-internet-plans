@extends('layouts.app')

@section('content')
    <h1>Editar Plano</h1>

    <form action="{{ route('plans.update', $plan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $plan->name) }}">
        </div>
        <div>
            <label for="description">Descrição:</label>
            <textarea name="description" id="description">{{ old('description', $plan->description) }}</textarea>
        </div>
        <div>
            <label for="price">Preço:</label>
            <input type="text" name="price" id="price" value="{{ old('price', $plan->price) }}">
        </div>
        <button type="submit">Salvar</button>
        <a href="{{ route('plans.index') }}">Voltar</a>
    </form>
@endsection
