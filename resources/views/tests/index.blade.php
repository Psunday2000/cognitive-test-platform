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
                    <strong><h5>Instructions</h5></strong>
                    <p>{{ __('Please read the following instructions carefully before starting the test.') }}</p>
                    <ul>
                        <li>{{ __('You will be given a set of multiple-choice questions.') }}</li>
                        <li>{{ __('Select the correct answer for each question.') }}</li>
                        <li>{{ __('You have limited time to complete the test.') }}</li>
                        <li>{{ __('The test will be automatically submitted once your time runs out.') }}</li>
                        <li>{{ __('Do not press the back button on the browser or close the browser until you have successfully submitted the test.') }}</li>
                    </ul>
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('tests.start', ['testId' => $test->id]) }}" class="btn btn-primary">
                            {{ __('Begin Test') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
