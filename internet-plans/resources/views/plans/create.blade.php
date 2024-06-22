@extends('layouts.app')

@section('content')
    <h1>Criar Novo Plano</h1>

    <form action="{{ route('plans.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="description">Descrição:</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="price">Preço:</label>
            <input type="text" name="price" id="price" value="{{ old('price') }}">
        </div>
        <button type="submit">Salvar</button>
        <th>.</th>
        <a href="{{ route('plans.index') }}">Voltar lista de Planos</a>
        <th>.</th>
        <a href="{{ route('home.menu') }}">Voltar menu principal</a>
    </form>
@endsection
