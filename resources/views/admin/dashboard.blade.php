<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Overview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Stat Card 1 -->
                <!-- Stat Card 1 -->
                <a href="{{ route('admin.users.index') }}"
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg shadow-indigo-500/10 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 relative group transition-transform hover:-translate-y-1 block hover:border-indigo-500/50">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg class="w-16 h-16 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider group-hover:text-indigo-600 transition-colors">Total
                        Users &rarr;</div>
                    <div class="mt-2 text-3xl font-extrabold text-gray-900 dark:text-white">{{ $stats['total_users'] }}
                    </div>
                    <div
                        class="mt-4 text-xs font-medium text-green-600 bg-green-100 dark:bg-green-900/30 dark:text-green-400 inline-block px-2 py-0.5 rounded-full">
                        Manage Users</div>
                </a>

                <!-- Stat Card 2 -->
                <a href="{{ route('admin.jobs.index') }}"
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg shadow-indigo-500/10 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 relative group transition-transform hover:-translate-y-1 block hover:border-indigo-500/50">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg class="w-16 h-16 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider group-hover:text-indigo-600 transition-colors">Total
                        Jobs &rarr;</div>
                    <div class="mt-2 text-3xl font-extrabold text-gray-900 dark:text-white">{{ $stats['total_jobs'] }}
                    </div>
                    <div
                        class="mt-4 text-xs font-medium text-indigo-600 bg-indigo-100 dark:bg-indigo-900/30 dark:text-indigo-400 inline-block px-2 py-0.5 rounded-full">
                        Manage Jobs</div>
                </a>

                <!-- Stat Card 3 -->
                <a href="{{ route('admin.jobs.index', ['status' => 'pending']) }}"
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg shadow-indigo-500/10 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 relative group transition-transform hover:-translate-y-1 block hover:border-amber-500/50">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg class="w-16 h-16 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider group-hover:text-amber-600 transition-colors">Pending
                        Action &rarr;</div>
                    <div class="mt-2 text-3xl font-extrabold text-gray-900 dark:text-white">{{ $stats['pending_jobs'] }}
                    </div>
                    <div
                        class="mt-4 text-xs font-medium text-amber-600 bg-amber-100 dark:bg-amber-900/30 dark:text-amber-400 inline-block px-2 py-0.5 rounded-full">
                        Requires Review</div>
                </a>

                <!-- Stat Card 4 -->
                <a href="{{ route('admin.applications.index') }}"
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg shadow-indigo-500/10 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 relative group transition-transform hover:-translate-y-1 block hover:border-purple-500/50">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <svg class="w-16 h-16 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider group-hover:text-purple-600 transition-colors">
                        Applications &rarr;</div>
                    <div class="mt-2 text-3xl font-extrabold text-gray-900 dark:text-white">
                        {{ $stats['total_applications'] }}</div>
                    <div
                        class="mt-4 text-xs font-medium text-purple-600 bg-purple-100 dark:bg-purple-900/30 dark:text-purple-400 inline-block px-2 py-0.5 rounded-full">
                        Manage All</div>
                </a>
            </div>

            <!-- Pending Jobs Moderation -->
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-6 flex items-center">
                        <span class="bg-amber-100 text-amber-600 p-2 rounded-lg mr-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </span>
                        Pending Job Approvals
                    </h3>

                    @if($pendingJobs->isEmpty())
                        <div
                            class="text-center py-8 text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-800 rounded-xl border border-dashed border-gray-300 dark:border-gray-600">
                            No jobs currently pending approval. Good job!
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Job Details</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Recruiter</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Posted On</th>
                                        <th
                                            class="px-6 py-3 text-right text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Moderation</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($pendingJobs as $job)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="font-bold text-gray-900 dark:text-white">{{ $job->title }}</div>
                                                <div class="text-xs text-gray-500 line-clamp-1">
                                                    {{ Str::limit($job->description, 50) }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                                                {{ $job->recruiter->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $job->created_at->format('M d, Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex items-center justify-end gap-2">
                                                    <a href="{{ route('jobs.show', $job) }}"
                                                        class="text-gray-500 hover:text-indigo-600 px-2 py-1" target="_blank"
                                                        title="View Job">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </a>

                                                    <form action="{{ route('admin.jobs.validate', $job) }}" method="POST"
                                                        class="inline-block">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="active">
                                                        <button type="submit"
                                                            class="bg-green-100 hover:bg-green-200 text-green-700 px-3 py-1 rounded-lg text-xs font-bold transition-colors">Approve</button>
                                                    </form>

                                                    <form action="{{ route('admin.jobs.validate', $job) }}" method="POST"
                                                        class="inline-block">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="rejected">
                                                        <button type="submit"
                                                            class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded-lg text-xs font-bold transition-colors">Reject</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>