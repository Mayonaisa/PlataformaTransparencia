<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obligacion extends Model
{
    protected $table = 'Obligaciones';
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;

    static function buscarPorTrimestre($trimestre)
    {
        return Obligacion::where('trimestre',$trimestre)->get();
    }
    
}
