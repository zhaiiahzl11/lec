<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\Question;

class AdminController extends Controller
{
    public function index()
    {
        $lectures = Lecture::withCount('questions')->get();
        return view('admin.index', compact('lectures'));
    }

    public function destroyLecture(Lecture $lecture)
    {
        $lecture->delete();
        return redirect()->back()->with('success', 'Lecture deleted');
    }
}
