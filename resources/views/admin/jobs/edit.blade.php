@extends('layouts.app')

@section('header')
    <header class="bg-light py-3 border-bottom">
        <div class="container">
            <h2 class="h4 mb-0">
                {{ __('Edit Job') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.jobs.update', $job->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Job Title -->
                        <div class="mb-3">
                            <label for="job_title" class="form-label">{{ __('Job Title') }}</label>
                            <input id="job_title" class="form-control" type="text" name="job_title" value="{{ old('job_title', $job->job_title) }}" required>
                            @error('job_title')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Job Details -->
                        <div class="mb-3">
                            <label for="details" class="form-label">{{ __('Details') }}</label>
                            <textarea id="details" class="form-control" name="details" required>{{ old('details', $job->details) }}</textarea>
                            @error('details')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Expected Score -->
                        <div class="mb-3">
                            <label for="expected_score" class="form-label">{{ __('Expected Score') }}</label>
                            <input type="number" id="expected_score" class="form-control" name="expected_score" value="{{ old('expected_score', $job->expected_score)}}" required>
                            @error('expected_score')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
