<!-- resources/views/maintenances/customer_maintenances.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Minhas Manutenções</div>

                <div class="card-body">
                    @if($maintenances->isEmpty())
                        <p>Você não tem manutenções agendadas.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <th>Agendada para</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($maintenances as $maintenance)
                                <tr>
                                    <td>{{ $maintenance->id }}</td>
                                    <td>{{ $maintenance->title }}</td>
                                    <td>{{ $maintenance->description }}</td>
                                    <td>{{ $maintenance->scheduled_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <a href="{{ route('maintenances.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
