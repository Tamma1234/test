<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;

    protected $table = "student_answers";

    protected $fillable = [
        'user_id',
        'question_id',
        'answers_id',
        'content',
        'time_submit',
        'dot_thi'
    ];
    public function questionsAnser() {
        return $this->belongsToMany(Question::class, "student_answers", "question_id", "answers_id");
    }
}
