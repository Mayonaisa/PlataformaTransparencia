<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Obligacion extends Model
{
    protected $table = 'Obligaciones';
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'nombre',
        'semestre',
        'año',
        'fragmento',
        'fraccion',
        'user_id',
        'aprovado',
        'created_at',
        'updated_at',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    static function buscarPorTrimestre($trimestre)
    {
        return Obligacion::where('trimestre',$trimestre)->get();
    }
    
}
