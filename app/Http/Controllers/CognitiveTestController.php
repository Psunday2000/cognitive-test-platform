<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Test;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CognitiveTestController extends Controller
{
    public function index()
    {
        // Load a random test from the database
        $test = Test::inRandomOrder()->first();
    
        $user = Auth::user();
    
        // Assuming `test_attempts` is a column in the `results` table
        $result = Result::where('user_id', $user->id)->first();
    
        if ($result && $result->test_attempts >= 2){
            return view('tests.limit_reached');
        }
    
        return view('tests.index', compact('test'));
    }
    
    public function startTest($testId)
    {
        $test = Test::findOrFail($testId);
        $questions = $test->questions()->inRandomOrder()->get();

        session(['test_id' => $testId]);

        return view('tests.start', compact('test', 'questions'));
    }



    public function submitTest(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'test_id' => 'required|exists:tests,id',
                'score' => 'required|numeric',
            ]);

            $userId = Auth::id();

            // Find existing result for the user or create a new one
            $result = Result::where('user_id', $userId)->first();

            if (!$result) {
                $result = new Result();
                $result->user_id = $userId;
            }

            $result->test_id = $validatedData['test_id'];
            $result->test_attempts++;
            $result->score = $validatedData['score'];

            $result->save();

            // Check for maximum attempts
            if ($result->test_attempts > 2) {
                return redirect()->route('tests.results')->with('error', 'Maximum attempts reached.');
            }

            return redirect()->route('tests.results');
        } catch (\Exception $e) {
            return redirect()->route('tests.results')->with('error', 'An error occurred while submitting the test.');
        }
    }
    


    public function results()
    {
        $score = session('score');
        $testId = session('test_id');
        $test = Test::find($testId);

        return view('tests.results', compact('score', 'test'));
    }


    public function eligibleJobs()
    {
        $user = Auth::user();
        $result = Result::where('user_id', $user->id)->latest()->first();

        if (!$result) {
            // Handle the case where the user has no results
            return redirect()->route('tests.index')->with('error', 'No test results found.');
        }

        $score = $result->score;
        $jobs = Job::where('expected_score', '<=', $score)->get();

        return view('tests.eligible-jobs', compact('jobs'));
    }

}
