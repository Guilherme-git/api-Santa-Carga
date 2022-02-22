<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    protected $table = 'cupom';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nome',
        'desconto',
        'data_criacao',
        'data_encerrar',
        'afiliado'
    ];

    public function afiliado()
    {
        return $this->hasMany(Afiliado::class,'id','afiliado');
    }
}
