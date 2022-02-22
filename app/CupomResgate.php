<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupomResgate extends Model
{
    protected $table = 'cupom_resgate';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'data_resgate',
        'cupom',
        'cliente',
        'afiliado'
    ];

    public function cliente()
    {
        return $this->hasMany(Cliente::class,'id','cliente');
    }

    public function afiliado()
    {
        return $this->hasMany(Afiliado::class,'id','afiliado');
    }

    public function cupom()
    {
        return $this->hasMany(Cupom::class,'id','cupom');
    }
}
