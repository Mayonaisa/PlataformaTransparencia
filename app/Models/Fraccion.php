<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Fraccion extends Model
{
    protected $table = 'fracciones';
    use HasFactory;

    protected $fillable = [
        'nombre',
        'articulo',
    ];
}
