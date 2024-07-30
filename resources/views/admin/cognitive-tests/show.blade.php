@extends('layouts.app')

@section('header')
    <header class="bg-light py-3 border-bottom">
        <div class="container">
            <h2 class="h4 mb-0">
                {{ __('Test Details') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div>
                        <h3 class="h5 mb-0">{{ $test->name }}</h3>
                        <p class="mt-2 text-muted">{{ __('Duration: :duration minutes', ['duration' => $test->duration]) }}</p>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('admin.cognitive-tests.index') }}" class="btn btn-secondary me-2">
                            {{ __('Back to List') }}
                        </a>

                        <a href="{{ route('admin.cognitive-tests.edit', $test->id) }}" class="btn btn-primary me-2">
                            {{ __('Edit') }}
                        </a>

                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
                            {{ __('Add Question') }}
                        </button>
                    </div>

                    <!-- Questions Table -->
                    <div class="mt-5">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">{{ __('Question') }}</th>
                                        <th scope="col">{{ __('Options') }}</th>
                                        <th scope="col">{{ __('Correct Answer') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($test->questions as $index => $question)
                                        <tr>
                                            <td><strong>{{ $index + 1 }}.</strong> {{ $question->question_text }}</td>
                                            <td>
                                                @if($question->option_a) <div><strong>A.</strong> {{ $question->option_a }}</div> @endif
                                                @if($question->option_b) <div><strong>B.</strong> {{ $question->option_b }}</div> @endif
                                                @if($question->option_c) <div><strong>C.</strong> {{ $question->option_c }}</div> @endif
                                                @if($question->option_d) <div><strong>D.</strong> {{ $question->option_d }}</div> @endif
                                                @if($question->option_e) <div><strong>E.</strong> {{ $question->option_e }}</div> @endif
                                            </td>
                                            <td>
                                                @switch($question->correct_answer)
                                                    @case('A') <strong>{{ $question->correct_answer}}.</strong> {{ $question->option_a }} @break
                                                    @case('B') <strong>{{ $question->correct_answer}}.</strong> {{ $question->option_b }} @break
                                                    @case('C') <strong>{{ $question->correct_answer}}.</strong> {{ $question->option_c }} @break
                                                    @case('D') <strong>{{ $question->correct_answer}}.</strong> {{ $question->option_d }} @break
                                                    @case('E') <strong>{{ $question->correct_answer}}.</strong> {{ $question->option_e }} @break
                                                @endswitch
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
    </div>

    <!-- Bootstrap Modal for Adding Question -->
    <div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQuestionModalLabel">{{ __('Add New Question') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.questions.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="test_id" value="{{ $test->id }}">

                        <div class="mb-3">
                            <label for="question_text" class="form-label">{{ __('Question Text') }}</label>
                            <input type="text" class="form-control" id="question_text" name="question_text" required>
                            @error('question_text')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Options') }}</label>
                            <div id="options-container">
                                <div class="mb-2">
                                    <input type="text" class="form-control mb-1" name="option_a" placeholder="Option A" required>
                                    <input type="radio" id="option_a_correct" name="correct_answer" value="A" class="form-check-input me-1">
                                    <label for="option_a_correct" class="form-check-label">{{ __('Correct') }}</label>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control mb-1" name="option_b" placeholder="Option B">
                                    <input type="radio" id="option_b_correct" name="correct_answer" value="B" class="form-check-input me-1">
                                    <label for="option_b_correct" class="form-check-label">{{ __('Correct') }}</label>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control mb-1" name="option_c" placeholder="Option C">
                                    <input type="radio" id="option_c_correct" name="correct_answer" value="C" class="form-check-input me-1">
                                    <label for="option_c_correct" class="form-check-label">{{ __('Correct') }}</label>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control mb-1" name="option_d" placeholder="Option D">
                                    <input type="radio" id="option_d_correct" name="correct_answer" value="D" class="form-check-input me-1">
                                    <label for="option_d_correct" class="form-check-label">{{ __('Correct') }}</label>
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control mb-1" name="option_e" placeholder="Option E">
                                    <input type="radio" id="option_e_correct" name="correct_answer" value="E" class="form-check-input me-1">
                                    <label for="option_e_correct" class="form-check-label">{{ __('Correct') }}</label>
                                </div>
                            </div>
                            @error('options')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="question_image" class="form-label">{{ __('Question Image (Optional)') }}</label>
                            <input type="file" class="form-control" id="question_image" name="question_image">
                            @error('question_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Add Question') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
