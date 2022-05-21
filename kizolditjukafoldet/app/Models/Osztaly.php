<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osztaly extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'osztaly';
    protected $fillable = [
        'nev',
    ];
}
