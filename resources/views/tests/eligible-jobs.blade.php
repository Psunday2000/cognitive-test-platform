@extends('layouts.app')

@section('header')
    <header class="bg-light py-3 border-bottom">
        <div class="container">
            <h2 class="h4 mb-0">
                {{ __('Eligible Jobs') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="h5">{{ __('Jobs You Can Apply For') }}</h3>
                    @if($jobs->isEmpty())
                        <p>{{ __('No jobs available for your current score.') }}</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">{{ __('S/N') }}</th>
                                        <th scope="col">{{ __('Job Title') }}</th>
                                        <th scope="col">{{ __('Details') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobs as $index => $job)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $job->job_title }}</td>
                                            <td>{{ $job->details }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('tests.index') }}" class="btn btn-primary">
                            {{ __('Back to Tests') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
