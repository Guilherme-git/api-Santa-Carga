<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    protected $table = 'afiliado';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nome',
        'email',
        'endereco',
        'cidade',
        'contato',
        'usuario',
        'senha',
        'latitude',
        'longitude',
        'tipo',
        'categoria',
    ];

    public function categoria()
    {
        return $this->hasMany(Categoria::class,'id','categoria');
    }

    public function horario()
    {
        return $this->hasMany(Horario::class,'afiliado','id');
    }
}
