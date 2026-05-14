@extends('layouts.app')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-slate-900 dark:text-white transition-colors duration-300">Admin Dashboard</h1>
        <p class="text-slate-500 dark:text-slate-400 mt-1 transition-colors duration-300">Manage lectures, questions, and view results.</p>
    </div>
</div>

<div class="bg-white dark:bg-white/5 dark:backdrop-blur-md rounded-2xl shadow-sm border border-slate-200 dark:border-white/10 overflow-hidden transition-colors duration-300">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200 dark:divide-white/10 transition-colors duration-300">
            <thead class="bg-slate-50 dark:bg-white/5 transition-colors duration-300">
                <tr>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider transition-colors duration-300">Lecture Title</th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider transition-colors duration-300">Questions</th>
                    <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider transition-colors duration-300">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 dark:divide-white/10 transition-colors duration-300">
                @forelse($lectures as $lecture)
                <tr class="hover:bg-slate-50 dark:hover:bg-white/5 transition-colors duration-300">
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold text-slate-900 dark:text-white transition-colors duration-300">{{ $lecture->title }}</div>
                        <div class="text-sm text-slate-500 dark:text-slate-400 line-clamp-1 max-w-md transition-colors duration-300">{{ $lecture->description }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-emerald-100 dark:bg-emerald-500/20 text-emerald-800 dark:text-emerald-300 transition-colors duration-300">
                            {{ $lecture->questions_count }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <form action="{{ route('admin.lecture.destroy', $lecture) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this lecture? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 font-bold bg-red-50 hover:bg-red-100 px-3 py-1 rounded-lg transition-colors">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-6 py-12 text-center text-slate-500 dark:text-slate-400 transition-colors duration-300">
                        No lectures found. Run the seeder to get started.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
