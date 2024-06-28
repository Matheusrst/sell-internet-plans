<!-- resources/views/maintenances/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Manutenção</div>

                <div class="card-body">
                    <form action="{{ route('maintenances.update', $maintenance->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="user_id">Cliente</label>
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ $maintenance->user_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $maintenance->title) }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description', $maintenance->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="scheduled_at">Agendada para</label>
                            <input type="datetime-local" name="scheduled_at" id="scheduled_at" class="form-control" value="{{ old('scheduled_at', \Carbon\Carbon::parse($maintenance->scheduled_at)->format('Y-m-d\TH:i')) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
                <a href="{{ route('maintenances.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
