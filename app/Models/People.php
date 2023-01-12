<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "people";

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'pemail',
        'ptelephone',
        'cmt',
        'paddress',
        'hash_id',
        'path',
        'parent_name',
        'is_active',
        'password'
    ];

    public function brands() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
