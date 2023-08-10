<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contDocumento extends Model
{
    protected $table = 'cont_Documentos';
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo',
    ];
}