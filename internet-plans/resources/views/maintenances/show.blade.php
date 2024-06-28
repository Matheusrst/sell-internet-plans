<!-- resources/views/maintenances/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $maintenance->title }}</div>

                <div class="card-body">
                    <p><strong>Cliente:</strong> {{ $maintenance->user->name }}</p>
                    <p><strong>Descrição:</strong> {{ $maintenance->description }}</p>
                    <p><strong>Agendada para:</strong> {{ $maintenance->scheduled_at }}</p>
                </div>
            </div>
            <a href="{{ route('maintenances.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</div>
@endsection
