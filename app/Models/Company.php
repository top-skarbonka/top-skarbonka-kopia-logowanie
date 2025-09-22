<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'city',
        'postal_code',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
