<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "user";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasMedia()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }

    public function hasInformation()
    {
        return $this->belongsTo(Information::class, 'information_id', 'id');
    }

    public function hasBusiness()
    {
        return $this->belongsTo(Business::class, 'business_id', 'id');
    }
}
