<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionType;
use App\Models\User;
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
        $totalQuestion =count(Question::all());
        $current = Carbon::now();
        $time = $current->toTimeString();
        $user = auth()->user();
        if (!$user->time_exam) {
            $user->update([
                'time_exam' => $time
            ]);
        }

        return view('admin.question.start-test', compact('question_type','time', 'totalQuestion', 'user'));
    }

    public function postQuestion(Request $request) {
        dd($request->all());
        $time_exam = $request->time_exam;
        $time = Carbon::now();
        $timeString = $time->toTimeString();
        dd($time_exam ."-". $timeString);
        $question_id = $request->question_id;
        $answers_id = $request->answers_id;

         dd($request->all());
    }


}
