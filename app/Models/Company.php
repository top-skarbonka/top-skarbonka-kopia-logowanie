<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'postal_code',
        'city',
        'street',
        'nip',
        'email',
        'phone',
        'password',
        'company_id',
    ];

    protected $hidden = [
        'password',
    ];
}
