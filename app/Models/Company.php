<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'nazwa_firmy',
        'kod_pocztowy',
        'miasto',
        'ulica',
        'nip',
        'email',
        'telefon',
        'exchange_rate',
    ];
}
