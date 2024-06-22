@extends('layouts.app')

@section('content')
    <h1>{{ $plan->name }}</h1>
    <p>{{ $plan->description }}</p>
    <p>R$ {{ $plan->price }}</p>
    <a href="{{ route('plans.index') }}">Voltar</a>
@endsection