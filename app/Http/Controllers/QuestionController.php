<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class QuestionController extends Controller
{
    public function index() {
        $question_type = QuestionType::all();
        return view('admin.question.index', compact('question_type'));
    }

    public function detail(Request $request) {
        $current = Carbon::now();
        $time = $current->toTimeString();
        $question_type = QuestionType::find($request->type);
        $question = Question::where('question_type', $request->type)->get();

        return view('admin.question.detail', compact('question', 'question_type', 'time'));
    }

    public function test() {
        $user = auth()->user();
        return view('admin.question.test', compact('user'));
    }

    public function startTest() {
        $question_type = QuestionType::all();
        $current = Carbon::now();
        $time = $current->toTimeString();

        return view('admin.question.start-test', compact('question_type', 'time'));
    }

    public function postQuestion(Request $request) {

        dd($request->all());
    }


}
