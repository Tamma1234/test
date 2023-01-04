<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = "people";

    use HasFactory;

    public function brands() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
