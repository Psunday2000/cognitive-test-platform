@extends('layouts.app')

@section('header')
    <header class="bg-light py-3 border-bottom">
        <div class="container">
            <h2 class="h4 mb-0">
                {{ __('Start Test') }}
            </h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="h5">{{ $test->name }}</h3>
                    <p class="mt-2">{{ __('Duration: :duration minutes', ['duration' => $test->duration]) }}</p>
                    
                    <!-- Timer Display -->
                    <div class="mb-3">
                        <h4>{{ __('Time Remaining') }}: <span id="timer">00:00</span></h4>
                    </div>

                    <form id="test-form" method="POST" action="{{ route('tests.submit-test') }}">
                        @csrf
                        <input type="hidden" name="test_id" value="{{ $test->id }}">
                        <input type="hidden" name="score" id="score" value="0">

                        <div id="questions-container">
                            @foreach($questions as $index => $question)
                                <div class="question mb-3" data-question-index="{{ $index }}" style="display: {{ $index === 0 ? 'block' : 'none' }};">
                                    <h5>{{ $question->question_text }}</h5>
                                    <input type="hidden" name="correct_answers[{{ $question->id }}]" value="{{ $question->correct_answer }}">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="A" id="q{{ $question->id }}a">
                                        <label class="form-check-label" for="q{{ $question->id }}a">
                                            {{ $question->option_a }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="B" id="q{{ $question->id }}b">
                                        <label class="form-check-label" for="q{{ $question->id }}b">
                                            {{ $question->option_b }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="C" id="q{{ $question->id }}c">
                                        <label class="form-check-label" for="q{{ $question->id }}c">
                                            {{ $question->option_c }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="D" id="q{{ $question->id }}d">
                                        <label class="form-check-label" for="q{{ $question->id }}d">
                                            {{ $question->option_d }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="E" id="q{{ $question->id }}e">
                                        <label class="form-check-label" for="q{{ $question->id }}e">
                                            {{ $question->option_e }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-secondary" id="prev-button" style="display: none;">
                                {{ __('Previous') }}
                            </button>
                            <button type="button" class="btn btn-secondary" id="next-button">
                                {{ __('Next') }}
                            </button>
                            <button type="button" class="btn btn-primary" id="submit-button" style="display: none;" onclick="calculateScore()">
                                {{ __('Submit Test') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentQuestionIndex = 0;
        const questions = document.querySelectorAll('.question');
        const totalQuestions = questions.length;
    
        // Timer setup
        const durationMinutes = {{ $test->duration }};
        let timeRemaining = durationMinutes * 60; // Convert minutes to seconds
        const timerElement = document.getElementById('timer');
        const testForm = document.getElementById('test-form');
    
        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secs = seconds % 60;
            return `${String(minutes).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
        }
    
        function updateTimer() {
            timerElement.textContent = formatTime(timeRemaining);
            if (timeRemaining <= 0) {
                clearInterval(timerInterval);
                calculateScore(); // Ensure score is calculated and form is submitted
            } else {
                timeRemaining--;
            }
        }
    
        const timerInterval = setInterval(updateTimer, 1000);
    
        document.getElementById('next-button').addEventListener('click', () => {
            if (currentQuestionIndex < totalQuestions - 1) {
                questions[currentQuestionIndex].style.display = 'none';
                currentQuestionIndex++;
                questions[currentQuestionIndex].style.display = 'block';
                updateNavigationButtons();
            }
        });
    
        document.getElementById('prev-button').addEventListener('click', () => {
            if (currentQuestionIndex > 0) {
                questions[currentQuestionIndex].style.display = 'none';
                currentQuestionIndex--;
                questions[currentQuestionIndex].style.display = 'block';
                updateNavigationButtons();
            }
        });
    
        function updateNavigationButtons() {
            document.getElementById('prev-button').style.display = currentQuestionIndex === 0 ? 'none' : 'inline-block';
            document.getElementById('next-button').style.display = currentQuestionIndex === totalQuestions - 1 ? 'none' : 'inline-block';
            document.getElementById('submit-button').style.display = currentQuestionIndex === totalQuestions - 1 ? 'inline-block' : 'none';
        }
    
        function calculateScore() {
            let score = 0;
            const correctAnswers = document.querySelectorAll('input[type="hidden"][name^="correct_answers"]');
            correctAnswers.forEach(correctAnswer => {
                const questionId = correctAnswer.name.match(/\d+/)[0];
                const userAnswer = document.querySelector(`input[name="answers[${questionId}]"]:checked`);
                if (userAnswer && userAnswer.value === correctAnswer.value) {
                    score++;
                }
            });
    
            // Calculate percentage score
            const percentageScore = (score / totalQuestions) * 100;
            document.getElementById('score').value = percentageScore.toFixed(2);
    
            // Submit the form
            testForm.submit();
        }
    </script>
    
@endsection