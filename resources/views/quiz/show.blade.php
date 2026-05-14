@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto" x-data="quizApp({{ $lecture->id }})" x-init="init()">
    
    <!-- Loading State -->
    <div x-show="loading" class="flex justify-center items-center py-20">
        <svg class="animate-spin -ml-1 mr-3 h-10 w-10 text-emerald-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span class="text-xl font-medium text-slate-400">Loading your quiz session...</span>
    </div>

    <!-- Quiz Content -->
    <div x-cloak x-show="!loading && !quizFinished && questions.length > 0">
        <!-- Header / Progress -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4 gap-4">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="mr-4 p-2 -ml-2 rounded-lg text-slate-400 hover:text-emerald-600 hover:bg-slate-100 dark:text-slate-500 dark:hover:text-emerald-400 dark:hover:bg-white/5 transition-colors" title="Back to Lectures">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </a>
                    <h2 class="text-xl sm:text-2xl font-bold text-slate-900 dark:text-white flex items-center">
                        {{ $lecture->title }}
                        <span x-show="isResumed" class="ml-3 px-2 py-0.5 sm:px-2.5 sm:py-1 bg-emerald-100 border-emerald-200 text-emerald-800 dark:bg-emerald-500/20 dark:border-emerald-500/30 dark:text-emerald-300 text-[10px] sm:text-xs font-bold rounded-lg border dark:backdrop-blur-sm transition-colors duration-300">Resumed</span>
                    </h2>
                </div>
                <div class="text-sm font-semibold text-emerald-800 bg-emerald-100 border-emerald-200 dark:text-emerald-300 dark:bg-emerald-500/20 border dark:border-emerald-500/30 px-3 py-1 rounded-full dark:backdrop-blur-sm transition-colors duration-300">
                    Score: <span x-text="score"></span>
                </div>
            </div>
            <div class="flex justify-between text-sm font-medium text-slate-500 dark:text-slate-400 mb-2 items-center transition-colors duration-300">
                <div class="flex items-center space-x-4">
                    <span>Question <span x-text="currentIndex + 1"></span> of <span x-text="questions.length"></span></span>
                    <button x-show="currentIndex > 0" @click="previousQuestion" class="text-emerald-600 hover:text-emerald-800 bg-slate-100 border-slate-200 dark:text-emerald-400 dark:hover:text-emerald-300 transition-colors font-bold text-xs flex items-center dark:bg-white/5 border dark:border-white/10 px-2 py-1 rounded dark:backdrop-blur-sm">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Previous
                    </button>
                </div>
                <span x-text="questions.length - currentIndex - 1 + ' remaining'"></span>
            </div>
            <div class="w-full bg-slate-200 dark:bg-white/10 rounded-full h-2.5 transition-colors duration-300">
                <div class="bg-emerald-500 h-2.5 rounded-full transition-all duration-500" :style="'width: ' + ((currentIndex / questions.length) * 100) + '%'"></div>
            </div>
        </div>

        <!-- Question Card -->
        <div class="bg-white dark:bg-white/5 dark:backdrop-blur-md rounded-3xl shadow-sm border border-slate-200 dark:border-white/10 p-5 sm:p-8 mb-6 relative transition-colors duration-300">
            
            <!-- Bookmark Button -->
            <button @click="toggleBookmark()" class="absolute top-4 right-4 sm:top-6 sm:right-6 text-slate-400 hover:text-emerald-500 dark:text-slate-500 dark:hover:text-emerald-400 transition-colors" :class="{ 'text-emerald-600 dark:text-emerald-500': isBookmarked() }">
                <svg class="w-8 h-8" :fill="isBookmarked() ? 'currentColor' : 'none'" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
            </button>

            <div class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-5 transition-colors duration-300"
                :class="{
                    'bg-emerald-100 text-emerald-800 border border-emerald-200 dark:bg-emerald-500/20 dark:text-emerald-300 dark:border-emerald-500/30': currentQuestion.difficulty === 'easy',
                    'bg-blue-100 text-blue-800 border border-blue-200 dark:bg-blue-500/20 dark:text-blue-300 dark:border-blue-500/30': currentQuestion.difficulty === 'medium',
                    'bg-rose-100 text-rose-800 border border-rose-200 dark:bg-rose-500/20 dark:text-rose-300 dark:border-rose-500/30': currentQuestion.difficulty === 'hard',
                }">
                <span x-text="currentQuestion.difficulty"></span>
            </div>

            <h3 class="text-lg sm:text-xl font-bold text-slate-900 dark:text-white mb-6 leading-relaxed pr-8 sm:pr-10 transition-colors duration-300" x-text="currentQuestion.question"></h3>
            
            <div class="space-y-3 sm:space-y-4">
                <template x-for="(choice, index) in currentQuestion.choices" :key="choice.id">
                    <button 
                        @click="selectChoice(choice)"
                        :disabled="answered"
                        class="w-full text-left p-4 sm:p-5 rounded-2xl border transition-all duration-200 flex items-center justify-between group"
                        :class="{
                            'border-slate-200 hover:border-emerald-500 hover:bg-emerald-50 text-slate-700 dark:border-white/10 dark:hover:border-emerald-500/50 dark:hover:bg-emerald-500/10 dark:text-slate-300': !answered,
                            'border-emerald-500 bg-emerald-50 text-emerald-800 dark:bg-emerald-500/20 dark:text-emerald-300': answered && choice.is_correct,
                            'border-rose-500 bg-rose-50 text-rose-800 dark:bg-rose-500/20 dark:text-rose-300': answered && !choice.is_correct && selectedChoice && selectedChoice.id === choice.id,
                            'border-slate-200 text-slate-400 dark:border-white/10 opacity-50 dark:text-slate-500': answered && !choice.is_correct && (selectedChoice && selectedChoice.id !== choice.id)
                        }"
                    >
                        <span class="text-lg font-medium" x-text="choice.choice_text"></span>
                        
                        <div x-show="answered && choice.is_correct" class="text-emerald-600 dark:text-emerald-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div x-show="answered && !choice.is_correct && selectedChoice && selectedChoice.id === choice.id" class="text-rose-600 dark:text-rose-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </div>
                    </button>
                </template>
            </div>
        </div>

        <!-- Feedback & Next Button -->
        <div x-show="answered" class="flex flex-col sm:flex-row justify-between items-center bg-white dark:bg-white/5 dark:backdrop-blur-md rounded-2xl p-6 border border-slate-200 dark:border-white/10 shadow-sm animate-fade-in-up transition-colors duration-300 gap-4">
            <div class="flex items-center w-full sm:w-auto">
                <template x-if="isCorrect()">
                    <div class="flex items-center text-emerald-600 dark:text-emerald-400 font-bold text-lg">
                        <div class="bg-emerald-100 border border-emerald-200 dark:bg-emerald-500/20 dark:border-emerald-500/30 p-2 rounded-full mr-3 transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                        </div>
                        Correct!
                    </div>
                </template>
                <template x-if="!isCorrect()">
                    <div class="flex items-center text-rose-600 dark:text-rose-400 font-bold text-lg">
                        <div class="bg-rose-100 border border-rose-200 dark:bg-rose-500/20 dark:border-rose-500/30 p-2 rounded-full mr-3 transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5"></path></svg>
                        </div>
                        Incorrect!
                    </div>
                </template>
            </div>
            <button @click="nextQuestion" class="w-full sm:w-auto px-8 py-3 bg-emerald-600 hover:bg-emerald-500 text-white dark:bg-emerald-500 dark:text-slate-950 font-black rounded-xl dark:hover:bg-emerald-400 transition-colors focus:ring-4 focus:ring-emerald-500/30">
                <span x-text="currentIndex === questions.length - 1 ? 'Finish Quiz' : 'Next Question'"></span>
            </button>
        </div>
    </div>

    <!-- Quiz Finished / Summary -->
    <div x-cloak x-show="!loading && quizFinished" class="max-w-3xl mx-auto bg-white dark:bg-white/5 dark:backdrop-blur-xl rounded-3xl p-6 sm:p-12 shadow-lg border border-slate-200 dark:border-white/10 animate-fade-in-up transition-colors duration-300">
        <div class="text-center mb-8 sm:mb-10">
            <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-emerald-100 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 mb-6 transition-colors duration-300">
                <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white mb-2 transition-colors duration-300">Quiz Completed!</h2>
            <p class="text-slate-600 dark:text-slate-400 text-base sm:text-lg mb-6 sm:mb-8 transition-colors duration-300">Here's how you did on {{ $lecture->title }}</p>
            
            <div class="bg-slate-50 dark:bg-white/5 rounded-2xl p-5 sm:p-8 mb-8 border border-slate-200 dark:border-white/10 flex flex-col sm:flex-row justify-around items-center gap-4 sm:gap-6 transition-colors duration-300">
                <div>
                    <p class="text-slate-500 dark:text-slate-400 font-medium mb-1 transition-colors duration-300">Final Score</p>
                    <div class="text-4xl sm:text-5xl font-black text-emerald-600 dark:text-emerald-400 transition-colors duration-300">
                        <span x-text="score"></span><span class="text-2xl text-slate-400 dark:text-slate-500">/<span x-text="questions.length"></span></span>
                    </div>
                </div>
                <div class="hidden sm:block w-px h-16 bg-slate-200 dark:bg-white/10"></div>
                <div>
                    <p class="text-slate-500 dark:text-slate-400 font-medium mb-1 transition-colors duration-300">Accuracy</p>
                    <div class="text-3xl font-bold text-slate-800 dark:text-white transition-colors duration-300" x-text="Math.round((score / questions.length) * 100) + '%'"></div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                <button x-show="score < questions.length" @click="retryIncorrect" class="w-full sm:w-auto px-6 sm:px-8 py-3 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 dark:bg-white/5 dark:border-white/20 dark:hover:bg-white/10 dark:text-white font-bold rounded-xl transition-colors">
                    Retry Incorrect
                </button>
                <button @click="restart" class="w-full sm:w-auto px-6 sm:px-8 py-3 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 dark:bg-white/5 dark:border-white/20 dark:hover:bg-white/10 dark:text-white font-bold rounded-xl transition-colors">
                    Restart Full Quiz
                </button>
                <a href="{{ route('home') }}" class="w-full sm:w-auto px-6 sm:px-8 py-3 bg-emerald-600 hover:bg-emerald-500 text-white dark:bg-emerald-500 dark:text-slate-950 font-black rounded-xl dark:hover:bg-emerald-400 transition-colors shadow-md flex justify-center items-center">
                    Back to Dashboard
                </a>
            </div>
        </div>

        <!-- Review Section -->
        <div class="mt-10">
            <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-6 border-b border-slate-200 dark:border-white/10 pb-4 transition-colors duration-300">Review Answers</h3>
            <div class="space-y-4 max-h-[500px] overflow-y-auto pr-4 custom-scrollbar">
                <template x-for="(q, idx) in allQuestions" :key="q.id">
                    <div class="p-5 rounded-2xl border transition-colors duration-300" :class="isQuestionCorrectlyAnswered(q) ? 'bg-emerald-50 border-emerald-200 dark:bg-emerald-500/10 dark:border-emerald-500/20' : 'bg-rose-50 border-rose-200 dark:bg-rose-500/10 dark:border-rose-500/20'">
                        <div class="font-bold text-slate-800 dark:text-white mb-2 transition-colors duration-300">
                            <span x-text="idx + 1 + '. '"></span> <span x-text="q.question"></span>
                        </div>
                        <div class="text-xs sm:text-sm">
                            <div class="font-semibold text-slate-600 dark:text-slate-400 mb-1 transition-colors duration-300 flex flex-col sm:flex-row sm:items-center">
                                <span class="w-full sm:w-28 mb-1 sm:mb-0">Your Answer:</span> 
                                <span :class="isQuestionCorrectlyAnswered(q) ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400'" x-text="getUserAnswerText(q)"></span>
                            </div>
                            <div x-show="!isQuestionCorrectlyAnswered(q)" class="font-semibold text-emerald-600 dark:text-emerald-400 transition-colors duration-300 flex flex-col sm:flex-row sm:items-center">
                                <span class="w-full sm:w-28 mb-1 sm:mb-0">Correct Answer:</span> 
                                <span x-text="getCorrectAnswerText(q)"></span>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>

</div>

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.4s ease-out forwards;
    }
    .custom-scrollbar::-webkit-scrollbar { width: 8px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
</style>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('quizApp', (lectureId) => ({
            lectureId: lectureId,
            userName: localStorage.getItem('student_buddy_name') || '',
            loading: true,
            
            allQuestions: [],
            questions: [], // Active questions for this run (might be subset if retrying)
            
            currentIndex: 0,
            score: 0,
            answered: false,
            selectedChoice: null,
            quizFinished: false,
            
            sessionId: null,
            answersRecord: {}, // question_id -> selected_choice_id
            bookmarks: [],
            isResumed: false,

            get currentQuestion() {
                return this.questions[this.currentIndex] || {};
            },

            async init() {
                if (!this.userName) {
                    window.location.href = '/';
                    return;
                }

                try {
                    // Fetch all questions for lecture
                    const qRes = await fetch(`/api/quiz/${this.lectureId}/questions`);
                    const loadedQuestions = await qRes.json();

                    // Init session
                    const sRes = await fetch(`/api/quiz/${this.lectureId}/session`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ user_name: this.userName })
                    });
                    
                    const sData = await sRes.json();
                    this.sessionId = sData.session.id;
                    this.bookmarks = sData.bookmarks;

                    let state = sData.session.state;
                    
                    if (state && state.questionsOrder && state.questionsOrder.length > 0) {
                        const orderMap = new Map();
                        state.questionsOrder.forEach((id, index) => { orderMap.set(id, index); });
                        
                        if (state.questionsOrder.length < loadedQuestions.length) {
                            const retryQuestions = loadedQuestions.filter(q => orderMap.has(q.id));
                            retryQuestions.sort((a, b) => orderMap.get(a.id) - orderMap.get(b.id));
                            this.questions = retryQuestions;
                        } else {
                            loadedQuestions.sort((a, b) => orderMap.get(a.id) - orderMap.get(b.id));
                            this.questions = [...loadedQuestions];
                        }
                    } else {
                        loadedQuestions.sort(() => Math.random() - 0.5);
                        loadedQuestions.forEach(q => q.choices.sort(() => Math.random() - 0.5));
                        
                        if (!state) state = {};
                        state.questionsOrder = loadedQuestions.map(q => q.id);
                        this.questions = [...loadedQuestions];
                    }
                    
                    this.allQuestions = loadedQuestions;
                    this.questionsOrder = state.questionsOrder;

                    if (state && state.answers && Object.keys(state.answers).length > 0 && !sData.session.completed) {
                        this.isResumed = true;
                        this.answersRecord = state.answers;
                        this.currentIndex = state.currentIndex || 0;
                        this.score = state.score || 0;
                        
                        // If they resumed on a question they already answered but didn't click next
                        this.restoreQuestionState();
                    } else if (sData.session.completed) {
                        this.quizFinished = true;
                        this.score = state.score || 0;
                    }
                    
                    if (!this.isResumed && !sData.session.completed) {
                        await this.saveSessionState();
                    }

                } catch (error) {
                    console.error('Initialization error:', error);
                } finally {
                    this.loading = false;
                }
            },

            async selectChoice(choice) {
                if (this.answered) return;
                
                this.selectedChoice = choice;
                this.answered = true;
                this.answersRecord[this.currentQuestion.id] = choice.id;
                
                if (choice.is_correct) {
                    this.score++;
                }

                await this.saveSessionState();
            },

            isCorrect() {
                return this.selectedChoice && this.selectedChoice.is_correct;
            },

            restoreQuestionState() {
                if (this.currentQuestion && this.answersRecord[this.currentQuestion.id]) {
                    this.answered = true;
                    this.selectedChoice = this.currentQuestion.choices.find(c => c.id === this.answersRecord[this.currentQuestion.id]);
                } else {
                    this.answered = false;
                    this.selectedChoice = null;
                }
            },

            async previousQuestion() {
                if (this.currentIndex > 0) {
                    this.currentIndex--;
                    this.restoreQuestionState();
                    await this.saveSessionState();
                }
            },

            async nextQuestion() {
                if (this.currentIndex < this.questions.length - 1) {
                    this.currentIndex++;
                    this.restoreQuestionState();
                    await this.saveSessionState();
                } else {
                    this.quizFinished = true;
                    if ((this.score / this.questions.length) >= 0.8) {
                        this.triggerConfetti();
                    }
                    await this.submitFinalResult();
                }
            },

            async saveSessionState() {
                try {
                    await fetch(`/api/quiz/session/${this.sessionId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            state: {
                                currentIndex: this.currentIndex,
                                score: this.score,
                                answers: this.answersRecord,
                                questionsOrder: this.questionsOrder
                            }
                        })
                    });
                } catch (e) { console.error('Failed to save state', e); }
            },

            async submitFinalResult() {
                try {
                    await fetch('/api/quiz/submit', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            user_name: this.userName,
                            lecture_id: this.lectureId,
                            score: this.score,
                            total_questions: this.questions.length,
                            percentage: (this.score / this.questions.length) * 100,
                            session_id: this.sessionId
                        })
                    });
                } catch (e) { console.error('Failed to submit final result', e); }
            },

            async toggleBookmark() {
                if (!this.currentQuestion) return;
                const qId = this.currentQuestion.id;
                try {
                    const res = await fetch('/api/bookmarks/toggle', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            user_name: this.userName,
                            question_id: qId
                        })
                    });
                    const data = await res.json();
                    if (data.bookmarked) {
                        if (!this.bookmarks.includes(qId)) this.bookmarks.push(qId);
                    } else {
                        this.bookmarks = this.bookmarks.filter(id => id !== qId);
                    }
                } catch (e) { console.error('Bookmark error', e); }
            },

            isBookmarked() {
                return this.currentQuestion && this.bookmarks.includes(this.currentQuestion.id);
            },

            isQuestionCorrectlyAnswered(q) {
                const choiceId = this.answersRecord[q.id];
                const choice = q.choices.find(c => c.id === choiceId);
                return choice && choice.is_correct;
            },

            getUserAnswerText(q) {
                const choiceId = this.answersRecord[q.id];
                const choice = q.choices.find(c => c.id === choiceId);
                return choice ? choice.choice_text : 'Skipped/No answer';
            },

            getCorrectAnswerText(q) {
                const choice = q.choices.find(c => c.is_correct);
                return choice ? choice.choice_text : 'Unknown';
            },

            retryIncorrect() {
                // Filter questions to only those answered incorrectly
                this.questions = this.questions.filter(q => !this.isQuestionCorrectlyAnswered(q));
                this.questions.sort(() => Math.random() - 0.5);
                this.questions.forEach(q => q.choices.sort(() => Math.random() - 0.5));
                this.questionsOrder = this.questions.map(q => q.id);
                this.resetQuizState();
            },

            restart() {
                this.questions = [...this.allQuestions];
                // Shuffle completely
                this.questions.sort(() => Math.random() - 0.5);
                this.questions.forEach(q => q.choices.sort(() => Math.random() - 0.5));
                this.questionsOrder = this.questions.map(q => q.id);
                this.resetQuizState();
            },

            async resetQuizState() {
                this.currentIndex = 0;
                this.score = 0;
                this.answered = false;
                this.selectedChoice = null;
                this.quizFinished = false;
                this.isResumed = false;
                this.answersRecord = {};
                
                // Re-init session in DB to clear completed status
                try {
                    const res = await fetch(`/api/quiz/${this.lectureId}/session`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ user_name: this.userName })
                    });
                    const sData = await res.json();
                    this.sessionId = sData.session.id;
                    await this.saveSessionState();
                } catch(e) {}
            },

            triggerConfetti() {
                for(let i = 0; i < 50; i++) {
                    let confetti = document.createElement('div');
                    confetti.classList.add('confetti-piece');
                    confetti.style.left = Math.random() * 100 + 'vw';
                    confetti.style.animationDuration = (Math.random() * 3 + 2) + 's';
                    confetti.style.backgroundColor = ['#4f46e5', '#10b981', '#f59e0b', '#ec4899', '#8b5cf6'][Math.floor(Math.random() * 5)];
                    document.body.appendChild(confetti);
                    setTimeout(() => confetti.remove(), 5000);
                }
            }
        }));
    });
</script>
@endsection
