<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = [ 'id',
                            'nome',
                            'endereco',
                            'email',
                            'telefone'];
    protected $table = 'clientes';

    public function compras()
    {
        return $this->hasMany(venda::class, 'cliente_id');
    }

    
}
