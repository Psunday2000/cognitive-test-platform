@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <header class="bg-light py-3 border-bottom">
        <div class="container">
            <h2 class="h4 mb-0">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </header>

    <!-- Main Content -->
    <div class="py-4">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column justify-content-between align-items-center">
                        <h3>{{ __('Welcome to the Cognitive Test Platform') }}</h3>
                    </div>
                    @if (Auth::user()->id === 2)
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
