<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Fraccion extends Model
{
    protected $table = 'asig_frags';
    use HasFactory;

    protected $fillable = [
        'idfragmento',
        'idfraccion',
    ];
}