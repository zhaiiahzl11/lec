<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\QuizResult;
use App\Models\QuizSession;
use App\Models\Bookmark;

class QuizController extends Controller
{
    public function index()
    {
        $lectures = Lecture::withCount('questions')->get();
        return view('welcome', compact('lectures'));
    }

    public function show(Lecture $lecture)
    {
        return view('quiz.show', compact('lecture'));
    }

    public function getQuestions(Lecture $lecture)
    {
        $questions = $lecture->questions()->with('choices')->get();

        // Send questions as they are in the database.
        // Shuffling and persisting the order is handled on the frontend.
        return response()->json($questions->values());
    }

    public function initSession(Request $request, Lecture $lecture)
    {
        $request->validate(['user_name' => 'required|string']);
        
        $session = QuizSession::firstOrCreate(
            [
                'user_name' => $request->user_name,
                'lecture_id' => $lecture->id,
                'completed' => false
            ],
            [
                'state' => [
                    'currentIndex' => 0,
                    'score' => 0,
                    'answers' => [],
                    'questionsOrder' => null // to store shuffled order
                ]
            ]
        );

        $bookmarks = Bookmark::where('user_name', $request->user_name)->pluck('question_id');

        return response()->json([
            'session' => $session,
            'bookmarks' => $bookmarks
        ]);
    }

    public function updateSession(Request $request, QuizSession $session)
    {
        $request->validate(['state' => 'required|array']);
        $session->update(['state' => $request->state]);
        return response()->json(['success' => true]);
    }

    public function toggleBookmark(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'question_id' => 'required|exists:questions,id'
        ]);

        $bookmark = Bookmark::where('user_name', $request->user_name)
                            ->where('question_id', $request->question_id)
                            ->first();

        if ($bookmark) {
            $bookmark->delete();
            return response()->json(['bookmarked' => false]);
        } else {
            Bookmark::create([
                'user_name' => $request->user_name,
                'question_id' => $request->question_id
            ]);
            return response()->json(['bookmarked' => true]);
        }
    }

    public function submitResult(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|string|max:255',
            'lecture_id' => 'required|exists:lectures,id',
            'score' => 'required|integer',
            'total_questions' => 'required|integer',
            'percentage' => 'required|numeric',
            'session_id' => 'nullable|exists:quiz_sessions,id'
        ]);

        $result = QuizResult::create($validated);

        if ($request->session_id) {
            QuizSession::where('id', $request->session_id)->update(['completed' => true]);
        }

        return response()->json(['success' => true, 'result' => $result]);
    }
}
