<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contDocumento extends Model
{
    protected $table = 'contDocumentos';
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo',
    ];
}
