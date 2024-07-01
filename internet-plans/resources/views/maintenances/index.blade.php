<!-- menu de listagem de manutenções -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Manutenções</div>

                <div class="card-body">
                    <a href="{{ route('maintenances.create') }}" class="btn btn-primary mb-3">Agendar Manutenção</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Agendada para</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maintenances as $maintenance)
                            <tr>
                                <td>{{ $maintenance->id }}</td>
                                <td>{{ $maintenance->user->name }}</td>
                                <td>{{ $maintenance->title }}</td>
                                <td>{{ $maintenance->description }}</td>
                                <td>{{ $maintenance->scheduled_at }}</td>
                                <td>
                                    <a href="{{ route('maintenances.show', $maintenance->id) }}" class="btn btn-primary">Ver</a>
                                    <a href="{{ route('maintenances.edit', $maintenance->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('maintenances.destroy', $maintenance->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('home.menu') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
