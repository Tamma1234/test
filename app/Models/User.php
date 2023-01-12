<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $table = "people";

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gpa',
        'pprovince_id',
        'district_id',
        'graduated_year',
        'school_id',
        'your_english_level',
        'certificate',
        'gender',
        'pemail',
        'ielts',
        'ptelephone',
        'pgen_code_date',
        'cmt_provided_date',
        'cmt_provided_where',
        'cmt',
        'pphone',
        'paddress',
        'hash_id',
        'path',
        'parent_name',
        'parent_address',
        'parent_job',
        'email_mobile',
        'parent1_mobile',
        'is_active',
        'password',
        'branch_id',
        'time_exam',
        'time_finish'
    ];

    public function hasBranch() {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function districts() {
        return $this->hasOne(Districts::class, 'id', 'district_id');
    }

    public function school() {
        return $this->hasOne(School::class, 'id', 'school_id');
    }
}
