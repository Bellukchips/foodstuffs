<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'profile_photo_path',
        'roles',
        'address',
        'phone',
        'zip_code',
        'province',
        'country',
        'city'
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
    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['profile_photo_path'] = $this->profile_photo_path;
        return $toArray;
    }
    public function getPicturePathAttribute()
    {
        return url('') . Storage::url($this->attributes['profile_photo_path']);
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
