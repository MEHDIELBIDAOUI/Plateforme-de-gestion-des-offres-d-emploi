<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Available Opportunities') }}
            </h2>

            <form action="{{ route('jobs.index') }}" method="GET" class="flex w-full md:w-auto gap-2">
                <input type="text" name="search" placeholder="Search jobs, location..." value="{{ request('search') }}"
                    class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:ring-indigo-500 focus:border-indigo-500 w-full md:w-64 shadow-sm">

                <select name="contract_type"
                    class="rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm hidden sm:block">
                    <option value="">All Types</option>
                    <option value="full_time" {{ request('contract_type') == 'full_time' ? 'selected' : '' }}>Full Time
                    </option>
                    <option value="part_time" {{ request('contract_type') == 'part_time' ? 'selected' : '' }}>Part Time
                    </option>
                    <option value="contract" {{ request('contract_type') == 'contract' ? 'selected' : '' }}>Contract
                    </option>
                    <option value="freelance" {{ request('contract_type') == 'freelance' ? 'selected' : '' }}>Freelance
                    </option>
                    <option value="internship" {{ request('contract_type') == 'internship' ? 'selected' : '' }}>Internship
                    </option>
                </select>

                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium shadow-md transition-colors">
                    Search
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($jobs as $job)
                    <div
                        class="group bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col h-full transform hover:-translate-y-1">
                        <div class="p-6 flex-grow">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <span
                                        class="inline-block px-3 py-1 text-xs font-semibold tracking-wide text-indigo-700 uppercase bg-indigo-50 rounded-full dark:bg-indigo-900/50 dark:text-indigo-300">
                                        {{ str_replace('_', ' ', $job->contract_type) }}
                                    </span>
                                </div>
                                <span
                                    class="text-xs text-gray-400 font-medium">{{ $job->created_at->diffForHumans() }}</span>
                            </div>

                            <a href="{{ route('jobs.show', $job) }}" class="block">
                                <h3
                                    class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors mb-2">
                                    {{ $job->title }}
                                </h3>
                            </a>

                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-4 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                {{ $job->recruiter->name }}
                            </div>

                            <p class="text-gray-600 dark:text-gray-300 text-sm line-clamp-3 leading-relaxed">
                                {{ Str::limit($job->description, 120) }}
                            </p>
                        </div>

                        <div
                            class="px-6 py-4 bg-gray-50/50 dark:bg-gray-700/30 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center">
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $job->location }}
                            </div>
                            <a href="{{ route('jobs.show', $job) }}"
                                class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 transition-colors flex items-center">
                                Apply Now <span class="ml-1 group-hover:translate-x-1 transition-transform">&rarr;</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>