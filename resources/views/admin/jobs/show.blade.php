@extends('layouts.app')

@section('header')
    <header class="bg-light py-3 border-bottom">
        <div class="container">
            <h2 class="h4 mb-0">
                {{ __('Job Details') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="mb-4">
                        <label for="job_title" class="form-label">{{ __('Job Title') }}</label>
                        <p id="job_title" class="form-control-plaintext">{{ $job->job_title }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="details" class="form-label">{{ __('Details') }}</label>
                        <p id="details" class="form-control-plaintext">{{ $job->details }}</p>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="d-flex justify-content-around">
                            <div class="p-2">
                                <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-primary mr-2">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="p-2">
                                <form method="POST" action="{{ route('admin.jobs.destroy', $job->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
