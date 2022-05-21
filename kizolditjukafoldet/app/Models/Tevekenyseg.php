<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tevekenyseg extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tevekenyseg';
    protected $fillable = [
        'tevekenyseg_nev',
        'pontszam',
    ];
}
