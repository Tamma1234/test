<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    protected $table = "district";

    use HasFactory;

    public function province() {
        return $this->hasOne(Province::class, 'id', 'province_id');
    }
}
