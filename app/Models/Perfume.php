<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $marca
 */
class Perfume extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca',
        'fragancia',
        'mL',
        'descricao'
    ];
}
