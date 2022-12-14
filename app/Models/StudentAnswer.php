<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;

    protected $table = "student_answers";

    public function questionsAnser() {
        return $this->belongsToMany(Question::class, "student_answers", "question_id", "answers_id");
    }
}
