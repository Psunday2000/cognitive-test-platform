@extends('layouts.app')

@section('header')
    <header class="bg-light py-3 border-bottom">
        <div class="container">
            <h2 class="h4 mb-0">
                {{ __('Test Result') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex flex-column justify-content-between align-items-center">
                        <h3>Your Score</h3>
                        <?php
                        // Fetch the user's latest score
                        $score = Auth::user()->result->score ?? null;
                        ?>
                        @if(isset($score))
                            <h1 class="mt-2">{{ $score }}%</h1>
                        @else
                            <p class="mt-2">{{ __('No test result found.') }}</p>
                        @endif
                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{ route('tests.index') }}" class="btn btn-primary">
                                {{ __('Back to Tests') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
