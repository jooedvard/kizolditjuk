<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bejegyzesek extends Model
{
    use HasFactory;
    protected $table = 'bejegyzesek';
    public $timestamps = false;
    protected $fillable = [
        'tevekenyseg_id',
        'osztaly_id',
        'diak',
        'allapot',
    ];

    public function osztaly(){
        return $this->hasOne(Osztaly::class, 'id', 'osztaly_id');
    }

    public function tevekenyseg(){
        return $this->hasOne(Tevekenyseg::class, 'id', 'tevekenyseg_id');
    }
}
