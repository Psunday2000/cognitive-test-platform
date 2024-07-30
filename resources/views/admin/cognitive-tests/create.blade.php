@extends('layouts.app')

@section('content')
    <header class="bg-light py-3 border-bottom">
        <div class="container">
            <h2 class="h4 mb-0">
                {{ __('Create Test') }}
            </h2>
        </div>
    </header>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.cognitive-tests.store') }}">
                        @csrf

                        <!-- Test Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Test Name') }}</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{ old('name', $test_name) }}" required />
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Duration -->
                        <div class="mb-3">
                            <label for="duration" class="form-label">{{ __('Duration (minutes)') }}</label>
                            <input id="duration" class="form-control" type="number" name="duration" value="{{ old('duration') }}" required autocomplete="duration" />
                            @error('duration')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('admin.cognitive-tests.index') }}" class="btn btn-link text-decoration-none text-secondary me-3">
                                {{ __('Back to List') }}
                            </a>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
