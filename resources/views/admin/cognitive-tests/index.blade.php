@extends('layouts.app')

@section('header')
    <header class="bg-light py-3 border-bottom">
        <div class="container">
            <h2 class="h4 mb-0">
                {{ __('Tests') }}
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
                        <a href="{{ route('admin.cognitive-tests.create') }}" class="btn btn-primary">
                            {{ __('Add New Test') }}
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('S/N') }}</th>
                                    <th scope="col">{{ __('Test Name') }}</th>
                                    <th scope="col">{{ __('Duration (minutes)') }}</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tests as $index => $test)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $test->name }}</td>
                                        <td>{{ $test->duration }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="p-2">
                                                    <a href="{{ route('admin.cognitive-tests.show', $test->id) }}" class="btn btn-primary mr-2">
                                                        <i class="fa fa-desktop" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="p-2">
                                                    <a href="{{ route('admin.cognitive-tests.edit', $test->id) }}" class="btn btn-success mr-2">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
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
