<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class JobController extends Controller
{
    /**
     * Display a listing of the admin.jobs.
     */
    public function index()
    {
        $jobs = Job::all();
        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new job.
     */
    public function create()
    {
        return view('admin.jobs.create');
    }

    /**
     * Store a newly created job in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'details' => 'required|string',
            'expected_score' => 'required|integer|min:0',
        ]);

        Job::create([
            'job_title' => $request->job_title,
            'details' => $request->details,
            'expected_score' => $request->expected_score,
        ]);

        return redirect()->route('admin.jobs.index')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified job.
     */
    public function show(string $id)
    {
        $job = Job::find($id);

        if (!$job) {
            return redirect()->route('admin.jobs.index')->with('error', 'Job not found.');
        }

        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified job.
     */
    public function edit(string $id)
    {
        $job = Job::find($id);

        if (!$job) {
            return redirect()->route('admin.jobs.index')->with('error', 'Job not found.');
        }

        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified job in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'details' => 'required|string',
            'expected_score' => 'required|integer|min:0',
        ]);

        $job = Job::find($id);

        if (!$job) {
            return redirect()->route('admin.jobs.index')->with('error', 'Job not found.');
        }

        $job->update([
            'job_title' => $request->job_title,
            'details' => $request->details,
            'expected_score' => $request->expected_score,
        ]);

        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified job from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::find($id);

        if (!$job) {
            return redirect()->route('admin.jobs.index')->with('error', 'Job not found.');
        }

        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully.');
    }
}
