<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;
use App\Models\Application;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Static Test Users
        // Admin
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password',
            'role' => 'admin',
        ]);

        // Recruiter
        $mainRecruiter = User::factory()->create([
            'name' => 'Recruiter User',
            'email' => 'recruiter@example.com',
            'password' => 'password',
            'role' => 'recruiter',
        ]);

        // Candidate
        $mainCandidate = User::factory()->create([
            'name' => 'Candidate User',
            'email' => 'candidate@example.com',
            'password' => 'password',
            'role' => 'candidate',
        ]);

        // 2. Create Random Recruiters and their Jobs
        $recruiters = User::factory(20)->create(['role' => 'recruiter']);

        $recruiters->each(function ($recruiter) {
            // Each recruiter posts 3-8 jobs
            Job::factory(rand(3, 8))->create([
                'recruiter_id' => $recruiter->id,
            ]);
        });

        // Also give the main recruiter some jobs
        $mainRecruiterJobs = Job::factory(10)->create([
            'recruiter_id' => $mainRecruiter->id,
        ]);


        // 3. Create Random Candidates
        $candidates = User::factory(50)->create(['role' => 'candidate']);

        $jobs = Job::all();

        // 4. Create Applications
        // Have the main candidate apply to some jobs
        $jobs->random(5)->each(function ($job) use ($mainCandidate) {
            Application::factory()->create([
                'job_id' => $job->id,
                'candidate_id' => $mainCandidate->id,
            ]);
        });

        // Have random candidates apply to random jobs
        $candidates->each(function ($candidate) use ($jobs) {
            // Each candidate applies to 1-4 jobs
            $jobs->random(rand(1, 4))->each(function ($job) use ($candidate) {
                // Ensure unique application per candidate/job if needed, 
                // but factory verification is complex. For seeding, typically acceptable to assume or use logic.
                // We'll just create.
                Application::factory()->create([
                    'job_id' => $job->id,
                    'candidate_id' => $candidate->id,
                ]);
            });
        });
    }
}
