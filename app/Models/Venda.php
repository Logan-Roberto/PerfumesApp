<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendedor',
        'data',
        'quantidade',
        'fkComprador_idCli',
        'fkPerfume_codPerf'
    ];
}
