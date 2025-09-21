<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'postal_code',
        'city',
        'street',
        'nip',
        'email',
        'phone',
        'exchange_rate',
    ];
}
