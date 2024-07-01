<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * model do user
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->user_type === 'admin';
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'sales');
    }
}
