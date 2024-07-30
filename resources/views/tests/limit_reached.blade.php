@extends('layouts.app')

@section('header')
    <header class="bg-light py-3 border-bottom">
        <div class="container">
            <h2 class="h4 mb-0">
                {{ __('Cognitive Tests') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="h5 mb-4">{{ __('Test Limit Reached') }}</h3>
                    <p>{{ __('You have reached the maximum number of test attempts.') }}</p>
                    <p>{{ __('Please contact support if you believe this is an error.') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
