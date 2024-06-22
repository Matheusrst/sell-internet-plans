<!-- resources/views/menu.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    @if(Auth::user()->user_type == 'admin')
                        @include('menu_admin')
                    @elseif(Auth::user()->user_type == 'customer')
                        @include('menu_customer')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
