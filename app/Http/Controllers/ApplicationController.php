<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    public function index(): View
    {
        $applications = Auth::user()->applications()->with('job')->latest()->paginate(10);
        return view('candidate.applications.index', compact('applications'));
    }

    public function store(Request $request, Job $job): RedirectResponse
    {
        $validated = $request->validate([
            'cv' => 'required|file|mimes:pdf|max:2048',
            'cover_letter' => 'nullable|string',
        ]);

        $path = $request->file('cv')->store('cvs', 'public');

        Application::create([
            'job_id' => $job->id,
            'candidate_id' => Auth::id(),
            'cv_path' => $path,
            'cover_letter' => $validated['cover_letter'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('jobs.show', $job)->with('success', 'Application submitted successfully!');
    }
}
