@extends('layouts.app')

@section('content')
<div x-data="{ userName: localStorage.getItem('student_buddy_name') || '' }" x-init="$watch('userName', value => localStorage.setItem('student_buddy_name', value))">

<div class="text-center mb-12">
    <div class="inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-slate-100 dark:bg-white/5 text-emerald-600 dark:text-emerald-400 font-semibold text-sm mb-6 tracking-wide uppercase border border-slate-200 dark:border-white/10 shadow-sm dark:backdrop-blur-md transition-colors duration-300">
        MedXD Active Recall
    </div>
    <h1 class="text-4xl font-extrabold text-slate-900 dark:text-white sm:text-5xl md:text-6xl tracking-tight leading-tight transition-colors duration-300">
        Master Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-teal-500 dark:from-emerald-400 dark:to-teal-400">Lectures</span>
    </h1>
    <p class="mt-6 max-w-2xl mx-auto text-lg text-slate-600 dark:text-slate-400 leading-relaxed font-medium transition-colors duration-300">
        Train your memory using our proven active recall quizzes. Enter your name and choose a topic to start.
    </p>
    
    <div class="mt-8 max-w-md mx-auto">
        <label for="userName" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2 transition-colors duration-300">Student Name</label>
        <input type="text" id="userName" x-model="userName" placeholder="Enter your full name (First & Last) to track progress..." class="w-full rounded-2xl bg-white dark:bg-white/5 border border-slate-300 dark:border-white/10 text-slate-900 dark:text-white focus:border-emerald-500 focus:ring-emerald-500 placeholder-slate-400 dark:placeholder-slate-500 shadow-sm px-6 py-4 text-lg text-center font-semibold transition-colors duration-300">
        <p class="text-xs text-slate-500 dark:text-slate-400 mt-2">Use your full real name to ensure your results aren't mixed with other students!</p>
    </div>
</div>

@php
    $currentLectures = $lectures->where('is_previous', false)->groupBy('category');
    $previousLectures = $lectures->where('is_previous', true)->groupBy('category');

    $categoryColors = [
        'Biostatistics' => ['bg' => 'bg-violet-100 dark:bg-violet-500/20', 'text' => 'text-violet-700 dark:text-violet-300', 'border' => 'border-violet-300 dark:border-violet-500/30', 'icon' => '📊'],
        'Histology' => ['bg' => 'bg-rose-100 dark:bg-rose-500/20', 'text' => 'text-rose-700 dark:text-rose-300', 'border' => 'border-rose-300 dark:border-rose-500/30', 'icon' => '🔬'],
        'Public Health' => ['bg' => 'bg-sky-100 dark:bg-sky-500/20', 'text' => 'text-sky-700 dark:text-sky-300', 'border' => 'border-sky-300 dark:border-sky-500/30', 'icon' => '🏥'],
    ];
@endphp

{{-- CURRENT LECTURES --}}
@forelse($currentLectures as $category => $categoryLectures)
    <div class="mb-10">
        <div class="flex items-center gap-3 mb-6">
            @php $colors = $categoryColors[$category] ?? ['bg' => 'bg-slate-100 dark:bg-slate-700', 'text' => 'text-slate-700 dark:text-slate-300', 'border' => 'border-slate-300 dark:border-slate-600', 'icon' => '📚']; @endphp
            <span class="text-2xl">{{ $colors['icon'] }}</span>
            <div class="inline-flex items-center px-4 py-1.5 rounded-full {{ $colors['bg'] }} {{ $colors['text'] }} border {{ $colors['border'] }} text-sm font-bold uppercase tracking-wider">
                {{ $category ?: 'Uncategorized' }}
            </div>
            <div class="flex-1 h-px bg-slate-200 dark:bg-white/10"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($categoryLectures as $lecture)
            <div class="group bg-white dark:bg-white/5 dark:backdrop-blur-md rounded-3xl shadow-sm border border-slate-200 dark:border-white/10 p-8 flex flex-col justify-between hover:shadow-xl dark:hover:shadow-2xl hover:shadow-emerald-500/10 dark:hover:shadow-emerald-500/10 hover:border-emerald-500/50 transition-all duration-300 transform hover:-translate-y-2 relative overflow-hidden" :class="{ 'opacity-50 pointer-events-none': !userName }">
                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 dark:bg-white/5 rounded-bl-full opacity-50 transition-transform group-hover:scale-110"></div>
                <div class="relative z-10">
                    <div class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-emerald-100 dark:bg-emerald-500/20 text-emerald-800 dark:text-emerald-300 text-xs font-bold uppercase tracking-wider mb-5 transition-colors duration-300">
                        {{ $lecture->questions_count }} Questions
                    </div>
                    <h3 class="text-2xl font-black text-slate-900 dark:text-white mb-3 leading-tight transition-colors duration-300">{{ $lecture->title }}</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-8 line-clamp-3 font-medium transition-colors duration-300">{{ $lecture->description }}</p>
                </div>
                <div class="relative z-10 mt-auto">
                    <a href="{{ route('quiz.show', $lecture) }}" class="inline-flex justify-center items-center w-full px-6 py-4 border border-transparent text-lg font-bold rounded-2xl text-white dark:text-slate-950 bg-emerald-600 hover:bg-emerald-500 dark:bg-emerald-500 dark:hover:bg-emerald-400 focus:outline-none focus:ring-4 focus:ring-emerald-500/30 transition-all shadow-md group-hover:shadow-emerald-500/30">
                        Start Quiz
                        <svg class="ml-2 -mr-1 w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@empty
    <div class="text-center py-16 bg-white dark:bg-white/5 dark:backdrop-blur-md rounded-3xl border border-dashed border-slate-300 dark:border-white/20 transition-colors duration-300">
        <svg class="mx-auto h-12 w-12 text-slate-400 dark:text-slate-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
        </svg>
        <h3 class="text-lg font-medium text-slate-900 dark:text-slate-300 transition-colors duration-300">No lectures available</h3>
        <p class="mt-1 text-slate-500 dark:text-slate-500">Run the seeder to generate content.</p>
    </div>
@endforelse

{{-- PREVIOUS LECTURES --}}
@if($previousLectures->count() > 0)
<div class="mt-20">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-tight transition-colors duration-300">Previous Lectures</h2>
        <p class="mt-2 text-slate-500 dark:text-slate-400 font-medium">Optional quizzes if you still want to review them.</p>
    </div>
    
    @foreach($previousLectures as $category => $categoryLectures)
    <div class="mb-10">
        <div class="flex items-center gap-3 mb-4">
            @php $colors = $categoryColors[$category] ?? ['bg' => 'bg-slate-100 dark:bg-slate-700', 'text' => 'text-slate-700 dark:text-slate-300', 'border' => 'border-slate-300 dark:border-slate-600', 'icon' => '📚']; @endphp
            <span class="text-xl">{{ $colors['icon'] }}</span>
            <div class="inline-flex items-center px-3 py-1 rounded-full {{ $colors['bg'] }} {{ $colors['text'] }} border {{ $colors['border'] }} text-xs font-bold uppercase tracking-wider">
                {{ $category ?: 'Uncategorized' }}
            </div>
            <div class="flex-1 h-px bg-slate-200 dark:bg-slate-700"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 opacity-75 hover:opacity-100 transition-opacity duration-300">
            @foreach($categoryLectures as $lecture)
            <div class="group bg-slate-50 dark:bg-slate-800/50 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 p-6 flex flex-col justify-between hover:shadow-md transition-all duration-300 relative overflow-hidden" :class="{ 'pointer-events-none': !userName }">
                <div class="relative z-10">
                    <div class="inline-flex items-center justify-center px-2 py-1 rounded bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-[10px] font-bold uppercase tracking-wider mb-3">
                        {{ $lecture->questions_count }} Questions
                    </div>
                    <h3 class="text-xl font-bold text-slate-700 dark:text-slate-200 mb-2 leading-tight">{{ $lecture->title }}</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mb-6 line-clamp-2">{{ $lecture->description }}</p>
                </div>
                <div class="relative z-10 mt-auto">
                    <a href="{{ route('quiz.show', $lecture) }}" class="inline-flex justify-center items-center w-full px-4 py-2 border border-slate-300 dark:border-slate-600 text-sm font-bold rounded-xl text-slate-700 dark:text-slate-200 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                        Review Quiz
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
@endif
</div>
@endsection

