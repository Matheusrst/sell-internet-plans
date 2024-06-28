<!-- resources/views/maintenances/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agendar Manutenção</div>

                <div class="card-body">
                    <form action="{{ route('maintenances.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="user_id">Cliente</label>
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="scheduled_at">Agendada para</label>
                            <input type="datetime-local" name="scheduled_at" id="scheduled_at" class="form-control" value="{{ old('scheduled_at') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Agendar</button>
                    </form>
                </div>
                <a href="{{ route('maintenances.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
