@extends('layouts.app')

@section('header')
    <header class="bg-light py-3 border-bottom">
        <div class="container">
            <h2 class="h4 mb-0">
                {{ __('Jobs') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="h5 mb-0">{{ __('Job Listings') }}</h3>
                        <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">{{ __('Create New Job') }}</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('S/N') }}</th>
                                    <th scope="col">{{ __('Job Title') }}</th>
                                    <th scope="col">{{ __('Details') }}</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $index => $job)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $job->job_title }}</td>
                                        <td>{{ $job->details }}</td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <div class="p-2">
                                                    <a href="{{ route('admin.jobs.show', $job->id) }}" class="btn btn-primary mr-2">
                                                        <i class="fa fa-desktop" aria-hidden="true"></i>
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
                                        </td>                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
