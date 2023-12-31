<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Obligacion extends Model
{
    protected $table = 'obligaciones';
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'año',
        'fragmento',
        'fraccion',
        'user_id',
        'estado',
        'articulo',
        'archivo',
        'direccion',
        'created_at',
        'updated_at',
        'hipervinculo',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
    
}
