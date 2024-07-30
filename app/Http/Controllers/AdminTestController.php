<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AdminTestController extends Controller
{
    /**
     * Display a listing of the cognitive-tests.
     */
    public function index()
    {
        $tests = Test::all();
        return view('admin.cognitive-tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new cognitive-tests.
     */
    public function create()
    {
        // Generate a random string of 25 characters including numbers
        $test_name = Str::random(25);

        return view('admin.cognitive-tests.create', compact('test_name'));
    }

    /**
     * Store a newly created test in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
        ]);

        // Create the Test record
        Test::create([
            'name' => $request->name,
            'duration' => $request->duration,
        ]);

        // Redirect with a success message
        return redirect()->route('admin.cognitive-tests.index')->with('success', 'Test created successfully.');
    }


    /**
     * Display the specified cognitive-tests.
     */
    public function show(string $id)
    {
        $test = Test::with('questions')->find($id);

        if (!$test) {
            return redirect()->route('admin.cognitive-tests.index')->with('error', 'Test not found.');
        }

        return view('admin.cognitive-tests.show', compact('test'));
    }


    /**
     * Show the form for editing the specified cognitive-tests.
     */
    public function edit(string $id)
    {
        $test = Test::find($id);

        if (!$test) {
            return redirect()->route('admin.cognitive-tests.index')->with('error', 'Test not found.');
        }

        return view('admin.cognitive-tests.edit', compact('test'));
    }

    /**
     * Update the specified test in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $test = Test::find($id);

        if (!$test) {
            return redirect()->route('admin.cognitive-tests.index')->with('error', 'Test not found.');
        }

        $test->update([
            'name' => $request->name,
            'duration' => $request->duration,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.cognitive-tests.index')->with('success', 'Test updated successfully.');
    }

    /**
     * Remove the specified test from storage.
     */
    public function destroy(string $id)
    {
        $test = Test::find($id);

        if (!$test) {
            return redirect()->route('admin.cognitive-tests.index')->with('error', 'Test not found.');
        }

        $test->delete();

        return redirect()->route('admin.cognitive-tests.index')->with('success', 'Test deleted successfully.');
    }
}
