<x-app-layout>
    <div class="bg-indigo-600 dark:bg-indigo-900 text-white py-12 relative overflow-hidden">
        <div class="absolute inset-0 bg-white/5 opacity-20 bg-[url('https://grainy-gradients.vercel.app/noise.svg')]">
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight">{{ $job->title }}</h1>
                    <div class="mt-4 flex flex-wrap gap-4 text-indigo-100">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-1.5 opacity-80" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            {{ $job->recruiter->name }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-1.5 opacity-80" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $job->location }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-1.5 opacity-80" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $job->salary ?? 'Competitive Salary' }}
                        </span>
                    </div>
                </div>
                <div class="mt-6 md:mt-0">
                    <span
                        class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-lg border border-white/30 font-semibold shadow-inner">
                        {{ ucfirst(str_replace('_', ' ', $job->contract_type)) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-20 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Job Description Column -->
            <div class="lg:col-span-2">
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 p-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 border-b pb-4 dark:border-gray-700">
                        About the Role</h3>
                    <div
                        class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                        {{ $job->description }}
                    </div>
                </div>
            </div>

            <!-- Sidebar / Action Column -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Apply / Edit Box -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 p-6 sticky top-24">
                    @if(Auth::user()->isCandidate())
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Interested?</h3>

                        @if(session('success'))
                            <div
                                class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('jobs.apply', $job) }}" method="POST" enctype="multipart/form-data"
                            class="space-y-4">
                            @csrf
                            <div>
                                <label for="cv"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Resume / CV
                                    (PDF)</label>
                                <input type="file" name="cv" id="cv" required accept="application/pdf"
                                    class="block w-full text-sm text-gray-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-indigo-50 file:text-indigo-700
                                        hover:file:bg-indigo-100
                                        cursor-pointer border border-gray-300 rounded-lg p-2 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                @error('cv')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="cover_letter"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Cover Letter
                                    (Optional)</label>
                                <textarea name="cover_letter" id="cover_letter" rows="4"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm dark:bg-gray-900 dark:border-gray-600 dark:text-white"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-xl shadow-lg shadow-indigo-500/30 transition-all hover:-translate-y-0.5">
                                Apply Now
                            </button>
                        </form>

                    @elseif(Auth::user()->isRecruiter() && Auth::id() === $job->recruiter_id)
                        <div class="text-center">
                            <p class="text-gray-500 mb-4 text-sm">You posted this job.</p>
                            <a href="{{ route('recruiter.jobs.edit', $job) }}"
                                class="block w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-4 rounded-xl shadow-lg shadow-amber-500/30 transition-all hover:-translate-y-0.5">
                                Edit Job Details
                            </a>
                        </div>
                    @else
                        <div class="text-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl">
                            <p class="text-gray-500 dark:text-gray-400 text-sm">
                                @guest
                                    Please <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">login</a> as a
                                    candidate to apply.
                                @else
                                    Recruiters cannot apply to jobs.
                                @endguest
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Recruiter Info Box -->
                <div
                    class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 flex items-center">
                    <div
                        class="h-12 w-12 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center text-indigo-700 dark:text-indigo-300 font-bold text-xl mr-4">
                        {{ substr($job->recruiter->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 uppercase font-semibold tracking-wider">Posted By</p>
                        <h4 class="font-bold text-gray-900 dark:text-white">{{ $job->recruiter->name }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>