<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index() {
        $question_type = QuestionType::all();
        return view('admin.question.index', compact('question_type'));
    }

    public function detail(Request $request) {
        $question_type = QuestionType::find($request->type);
        $question = Question::where('question_type', $request->type)->get();
        return view('admin.question.detail', compact('question'));
    }
}
