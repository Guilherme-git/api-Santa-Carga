<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'horario_inicio',
        'horario_inicio',
        'horario_fim',
        'semana',
        'afiliado'
    ];
}
