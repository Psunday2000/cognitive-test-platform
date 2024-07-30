@extends('layouts.app')

@section('header')
    <header class="bg-light py-3 border-bottom">
        <div class="container">
            <h2 class="h4 mb-0">
                {{ __('Edit Test') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.cognitive-tests.update', $test->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Test Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Test Name') }}</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{ old('name', $test->name) }}" required hidden>
                            @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Duration -->
                        <div class="mb-3">
                            <label for="duration" class="form-label">{{ __('Duration (minutes)') }}</label>
                            <input id="duration" class="form-control" type="number" name="duration" value="{{ old('duration', $test->duration) }}" required>
                            @error('duration')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.cognitive-tests.index') }}" class="btn btn-primary">
                                {{ __('Back to List') }}
                            </a>
                            <button type="submit" class="btn btn-success ms-3">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
