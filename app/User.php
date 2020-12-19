<?php

namespace App;

use App\Models\Bakery;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'password', 'device_token', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bakery()
    {
        return $this->hasOne(Bakery::class, 'user_id', 'id');
    }

    public function bakery_agent()
    {
        return $this->hasMany(Bakery::class, 'agency_id', 'id');
    }

    public function report()
    {
        return $this->hasMany(Bakery::class, 'report_by', 'id');
    }
}
