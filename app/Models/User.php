<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $table = "student_user";

    protected $fillable =[
        'full_name',
        'email',
        'password',
        'phone_number',
        'address',
        'parent_name',
        'is_active',
        'information_id',
        'business_id',
        'media_id',
        'after_exam',
        'transition',
        'english_level',
        'ielts',
        'toefl',
        'certificate',
        'participation',
        'scholarship_exam'
    ];

    public function hasBranch() {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
