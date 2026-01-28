<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_users' => User::count(),
            'total_jobs' => Job::count(),
            'total_applications' => Application::count(),
            'pending_jobs' => Job::where('status', 'pending')->count(),
        ];

        $pendingJobs = Job::with('recruiter')->where('status', 'pending')->latest()->take(10)->get();

        return view('admin.dashboard', compact('stats', 'pendingJobs'));
    }

    public function validateJob(Job $job, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:active,rejected',
        ]);

        $job->update(['status' => $validated['status']]);

        return redirect()->route('admin.dashboard')->with('success', 'Job status updated successfully.');
    }

    public function users(): View
    {
        $users = User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function jobs(Request $request): View
    {
        $query = Job::with('recruiter')->latest();

        if ($request->has('status')) {
            $query->where('status', $request->get('status'));
        }

        $jobs = $query->paginate(15);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function applications(): View
    {
        $applications = Application::with(['job', 'candidate'])->latest()->paginate(15);
        return view('admin.applications.index', compact('applications'));
    }

    public function destroyUser(User $user): RedirectResponse
    {
        if ($user->isAdmin()) {
            return back()->with('error', 'Cannot delete admin users.');
        }

        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }

    public function destroyJob(Job $job): RedirectResponse
    {
        $job->delete();
        return back()->with('success', 'Job deleted successfully.');
    }

    public function destroyApplication(Application $application): RedirectResponse
    {
        $application->delete();
        return back()->with('success', 'Application deleted successfully.');
    }
}
