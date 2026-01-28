<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->isRecruiter()) {
            // Redirect recruiters to their job listings as their main dashboard for now
            return redirect()->route('recruiter.jobs.index');
        }

        if ($user->isCandidate()) {
            // Redirect candidates to their applications as their main dashboard for now
            return redirect()->route('candidate.applications.index');
        }

        // Fallback or generic dashboard if needed
        return view('dashboard');
    }
}
