<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Fragmento extends Model
{
    protected $table = 'Fragmentos';
    use HasFactory;
    protected $fillable = [
        'nombre',
    ];
}
