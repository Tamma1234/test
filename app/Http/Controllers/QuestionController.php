<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Question;
use App\Models\Questions;
use App\Models\QuestionType;
use App\Models\StudentAnswer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class QuestionController extends Controller
{
    public function index()
    {
        $question_type = QuestionType::all();
        return view('admin.question.index', compact('question_type'));
    }

    public function detail(Request $request)
    {
        $current = Carbon::now();
        $user = auth()->user();
        $time = $current->toTimeString();
        $question_type = QuestionType::find($request->type);
        $question = Questions::where('question_type', $request->type)->where('parent_id', 0)->get();

        return view('admin.question.detail', compact('question', 'question_type', 'time', 'user'));
    }

    public function test()
    {
        $user = auth()->user();
        return view('admin.question.test', compact('user'));
    }

    public function startTest()
    {
        $user = auth()->user();
        $question_type = QuestionType::all();
        $question = Questions::where('parent_id', 0)
            ->pluck('id')
            ->toArray();
        $totalQuestion = count($question);
        $current = Carbon::now();
        $time = $current->toTimeString();
        if (!$user->time_exam) {
            $user->update([
                'time_exam' => $time
            ]);
        }

        return view('admin.question.start-test', compact('question_type', 'time', 'totalQuestion', 'user'));
    }

    public function postQuestion(Request $request)
    {
        $time_exam = $request->time_exam;
        $time = Carbon::now();
        $timeString = $time->toTimeString();
        $dateTime = $time->toDateTimeString();
        $user = auth()->user();
        $user->update([
            'time_exam' => $time_exam,
            'time_finish' => $timeString
        ]);
        $answers = $request->answers;
        if (!empty($answers)) {
            $studentAnswers = new StudentAnswer();
            foreach ($answers as $key => $item) {
                $studentAnswers->insert([
                    'user_id' => $user->pemail,
                    'question_id' => $key,
                    'answers_id' => $item,
                    'content' => "",
                    'time_submit' => $dateTime,
                    'dot_thi' => 0
                ]);
            }
        }

        return redirect()->route('question.test')->with('finish_exam', 'You have completed the test');
    }

    public function getAnswer(Request $request)
    {
        $id = $request->id;
        $question = Questions::find($id);
        $answers = $question->answers;
        $output = "";
        $output .= '<h3 class="kt-section__title">' . $question->question_content . '</h3>';
        $output .= '<div class="kt-radio-list">';
        foreach ($answers as $item) {
            $output .= '<label class="kt-radio">';
            $output .= '<input type="checkbox" name="answers[]" value="' . $item->id . '">' . $item->question_content . '<span></span>';
            $output .= '</label>';
        };
        $output .= '</div >';

        return $output;
    }

    public function totalQuestion(Request $request)
    {
        $id = $request->id;
        $arr = explode(' ', $id);
        $question = Questions::where('parent_id', 0)
            ->pluck('id')
            ->toArray();

        $totalQuestion = count($question);
        $arrQuestion = array_diff($question, $arr);
        $totalArrQuestion = count($arrQuestion);
        dd($totalArrQuestion);
    }

    public function listAnswer(Request $request)
    {
        $id = $request->id;
        $user = auth()->user();
        $questiontype = QuestionType::find($id);
        $questions = Questions::where('question_type', $questiontype->id)
                    ->where('parent_id', 0)->get();
        $output = "";

        $output .= '<div class="kt-portlet">';
            $output .= '<div class="kt-portlet__head">';
                $output .= '<div class="kt-portlet__head-label">';
                $output .= '<h3 class="kt-portlet__head-title" style="color: #6a5bf1; font-weight: 600">' . $questiontype->name . '</h3>';
                $output .= '</div>';
            $output .= '</div>';
            $output .= '<input type="hidden" value="'.$user->time_exam.'" name="time_exam" id="time_start" >';
            $output .= '<div class="kt-portlet__body" id="question">';
                foreach ($questions as $question) {
                    $output .= ' <div class="kt-section kt-section--first">';
                        $output .= '<h3 class="kt-section__title" id="' . $question->id . '">' . $question->question_content . '</h3>';
                        $output .= '<div class="kt-radio-list">';
                        foreach ($question->answers as $answer) {
                            $output .= '<label class="kt-radio">';
                            $output .= '<input id="' . $answer->id . '" onclick="chooseAnswers(' . $answer->id . ')" type="radio" name="answers[ ' . $question->id . ' ]" value="' . $answer->id . '"> ' . $answer->question_content . ' <span></span>';
                            $output .= '</label>';
                        }
                        $output .= '</div>';
                    $output .= '</div>';
                }
            $output .= '</div>';
        $output .= '</div>';

       return $output;
    }
}
