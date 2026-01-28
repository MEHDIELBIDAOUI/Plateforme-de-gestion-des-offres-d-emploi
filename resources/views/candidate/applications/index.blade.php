<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Application Tracking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    @if($applications->isEmpty())
                        <div class="text-center py-12">
                            <div
                                class="mx-auto h-24 w-24 bg-indigo-50 dark:bg-indigo-900/30 rounded-full flex items-center justify-center mb-4">
                                <svg class="h-12 w-12 text-indigo-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">No Applications Yet</h3>
                            <p class="text-gray-500 dark:text-gray-400 mb-6">Start your career journey by browsing available
                                positions.</p>
                            <a href="{{ route('jobs.index') }}"
                                class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/30 transition-all hover:-translate-y-0.5">
                                Browse Jobs
                            </a>
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach($applications as $application)
                                <div
                                    class="group border border-gray-100 dark:border-gray-700 p-6 rounded-2xl bg-gray-50 dark:bg-gray-700/30 hover:bg-white dark:hover:bg-gray-700 hover:shadow-lg transition-all duration-300 flex flex-col md:flex-row justify-between items-start md:items-center">
                                    <div class="flex items-start gap-4">
                                        <div
                                            class="h-12 w-12 rounded-xl bg-white dark:bg-gray-800 flex items-center justify-center border border-gray-200 dark:border-gray-600 shadow-sm text-indigo-600 font-bold text-lg">
                                            {{ substr($application->job->recruiter->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <h3
                                                class="text-lg font-bold text-gray-900 dark:text-white group-hover:text-indigo-600 transition-colors">
                                                {{ $application->job->title }}</h3>
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                {{ $application->job->recruiter->name }} &bull;
                                                {{ $application->created_at->format('M d, Y') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div
                                        class="mt-4 md:mt-0 flex items-center gap-6 w-full md:w-auto justify-between md:justify-end">
                                        <div class="text-right">
                                            <span
                                                class="block text-xs text-gray-400 font-semibold uppercase tracking-wider mb-1">Status</span>
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold
                                                        @if($application->status === 'accepted') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300
                                                        @elseif($application->status === 'rejected') bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300
                                                        @else bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-300 @endif">
                                                <span class="w-2 h-2 rounded-full mr-2 bg-current"></span>
                                                {{ ucfirst($application->status) }}
                                            </span>
                                        </div>

                                        <a href="{{ route('jobs.show', $application->job) }}"
                                            class="p-2 text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8">
                            {{ $applications->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>