<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = Job::with('recruiter')->where('status', 'active');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('contract_type')) {
            $query->where('contract_type', $request->input('contract_type'));
        }

        $jobs = $query->latest()->paginate(10);
        return view('jobs.index', compact('jobs'));
    }

    public function recruiterJobs(): View
    {
        $jobs = Auth::user()->jobs()->latest()->paginate(10);
        return view('recruiter.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('recruiter.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'contract_type' => 'required|in:full_time,part_time,contract,internship,freelance',
            'salary' => 'nullable|string',
        ]);

        $request->user()->jobs()->create($validated + ['status' => 'pending']);

        return redirect()->route('recruiter.jobs.index')->with('success', 'Job posted successfully and is pending approval.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job): View
    {
        if ($job->status !== 'active' && $job->recruiter_id !== Auth::id() && !Auth::user()?->isAdmin()) {
            abort(404);
        }
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job): View
    {
        if ($job->recruiter_id !== Auth::id()) {
            abort(403);
        }
        return view('recruiter.jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job): RedirectResponse
    {
        if ($job->recruiter_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'contract_type' => 'required|in:full_time,part_time,contract,internship,freelance',
            'salary' => 'nullable|string',
        ]);

        $job->update($validated);

        return redirect()->route('recruiter.jobs.index')->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job): RedirectResponse
    {
        if ($job->recruiter_id !== Auth::id()) {
            abort(403);
        }

        $job->delete();

        return redirect()->route('recruiter.jobs.index')->with('success', 'Job deleted successfully.');
    }
}
