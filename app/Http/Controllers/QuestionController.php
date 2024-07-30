<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the questions.
     */
    public function index()
    {
        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new question.
     */
    public function create()
    {
        $tests = Test::all(); // For dropdown or selection
        return view('admin.questions.create', compact('tests'));
    }

    /**
     * Store a newly created question in storage.
     */
    public function store(Request $request)
    {
        // Log the incoming request data
        Log::info('Store method called', ['request_data' => $request->all()]);

        // Validate the request
        $validatedData = $request->validate([
            'test_id' => 'required|exists:tests,id',
            'question_text' => 'required|string',
            'option_a' => 'nullable|string|max:2048',
            'option_b' => 'nullable|string|max:2048',
            'option_c' => 'nullable|string|max:2048',
            'option_d' => 'nullable|string|max:2048',
            'option_e' => 'nullable|string|max:2048',
            'correct_answer' => 'required|string|in:A,B,C,D,E',
            'question_image' => 'nullable|image|max:2048',
        ]);
        Log::info('Validation passed', ['validated_data' => $validatedData]);

        // Handle image upload if present
        if ($request->hasFile('question_image')) {
            $imagePath = $request->file('question_image')->store('images/questions', 'public');
            Log::info('Image uploaded', ['image_path' => $imagePath]);
        } else {
            $imagePath = null;
            Log::info('No image uploaded');
        }

        // Create the question
        $question = Question::create([
            'test_id' => $request->test_id,
            'question_text' => $request->question_text,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'option_e' => $request->option_e,
            'correct_answer' => $request->correct_answer,
            'question_image' => $imagePath,
        ]);
        Log::info('Question created', ['question_id' => $question->id]);

        // Redirect with success message
        return redirect()->route('admin.cognitive-tests.show', $request->test_id)
                        ->with('success', 'Question created successfully.');
    }

    /**
     * Display the specified question.
     */
    public function show(string $id)
    {
        $question = Question::find($id);

        if (!$question) {
            return redirect()->route('admin.questions.index')->with('error', 'Question not found.');
        }

        return view('admin.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified question.
     */
    public function edit(string $id)
    {
        $question = Question::find($id);

        if (!$question) {
            return redirect()->route('admin.questions.index')->with('error', 'Question not found.');
        }

        $tests = Test::all(); // For dropdown or selection
        return view('admin.questions.edit', compact('question', 'tests'));
    }

    /**
     * Update the specified question in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'test_id' => 'required|exists:tests,id',
            'question_text' => 'required|string',
            'option_a' => 'nullable|string',
            'option_b' => 'nullable|string',
            'option_c' => 'nullable|string',
            'option_d' => 'nullable|string',
            'option_e' => 'nullable|string',
            'correct_answer' => 'required|string|in:A,B,C,D,E',
            'question_image' => 'nullable|image|max:2048',
        ]);

        $question = Question::find($id);

        if (!$question) {
            return redirect()->route('admin.questions.index')->with('error', 'Question not found.');
        }

        // Handle image upload if present
        if ($request->hasFile('question_image')) {
            // Delete old image if exists
            if ($question->question_image) {
                Storage::disk('public')->delete($question->question_image);
            }
            $imagePath = $request->file('question_image')->store('images/questions', 'public');
        } else {
            $imagePath = $question->question_image;
        }

        $question->update([
            'test_id' => $request->test_id,
            'question_text' => $request->question_text,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'option_e' => $request->option_e,
            'correct_answer' => $request->correct_answer,
            'question_image' => $imagePath,
        ]);

        return redirect()->route('admin.questions.index')->with('success', 'Question updated successfully.');
    }

    /**
     * Remove the specified question from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::find($id);

        if (!$question) {
            return redirect()->route('admin.questions.index')->with('error', 'Question not found.');
        }

        // Delete image if exists
        if ($question->question_image) {
            Storage::disk('public')->delete($question->question_image);
        }

        $question->delete();

        return redirect()->route('admin.questions.index')->with('success', 'Question deleted successfully.');
    }
}
