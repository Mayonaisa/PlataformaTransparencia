<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contObligacion extends Model
{
    protected $table = 'contObligaciones';
    use HasFactory;

    protected $fillable = [
        'nombre',
        'notas',
        'trimestre',
        'año',
        'fragmento',
        'user_id',
        'cont_documento',
        'estado',
        'archivo',
        'direccion',
    ];

    public function fragmento()
    {
        return $this->belongsTo(Fragmento::class, 'fragmento');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contDocumento()
    {
        return $this->belongsTo(ContDocumento::class, 'cont_documento');
    }
}
