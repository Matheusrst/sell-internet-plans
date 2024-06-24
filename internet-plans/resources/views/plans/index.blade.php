@extends('layouts.app')

@section('content')
    <h1>Planos de Internet</h1>
    <a href="{{ route('plans.create') }}">Criar Novo Plano</a>
    <ul>
        @foreach ($plans as $plan)
            <li>
                <a href="{{ route('plans.show', $plan->id) }}">{{ $plan->name }}</a> - R$ {{ $plan->price }}
                <a href="{{ route('plans.edit', $plan->id) }}">Editar</a>
                <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                    <th>.</th>
                    <a href="{{ route('home.menu', $plan->id) }}" class="btn btn-primary">Voltar</a>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
