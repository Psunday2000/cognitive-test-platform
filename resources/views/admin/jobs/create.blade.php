@extends('layouts.app')

@section('header')
    <header class="bg-light py-3 border-bottom">
        <div class="container">
            <h2 class="h4 mb-0">
                {{ __('Create Job') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.jobs.store') }}">
                        @csrf

                        <!-- Job Title -->
                        <div class="mb-4">
                            <label for="job_title" class="form-label">{{ __('Job Title') }}</label>
                            <input id="job_title" type="text" class="form-control" name="job_title" value="{{ old('job_title') }}" required>
                            @if($errors->has('job_title'))
                                <div class="text-danger mt-2">{{ $errors->first('job_title') }}</div>
                            @endif
                        </div>

                        <!-- Job Details -->
                        <div class="mb-4">
                            <label for="details" class="form-label">{{ __('Details') }}</label>
                            <textarea id="details" class="form-control" name="details" required>{{ old('details') }}</textarea>
                            @if($errors->has('details'))
                                <div class="text-danger mt-2">{{ $errors->first('details') }}</div>
                            @endif
                        </div>

                        <!-- Expected Score -->
                        <div class="mb-4">
                            <label for="expected_score" class="form-label">{{ __('Expected Score') }}</label>
                            <input type="number" id="expected_score" class="form-control" name="expected_score" required>
                            @if($errors->has('expected_score'))
                                <div class="text-danger mt-2">{{ $errors->first('expected_score') }}</div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
