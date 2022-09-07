<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
    use HasFactory;

    protected $fillable = [ 'id',
                            'matricula',
                            'nome'];
    protected $table = 'vendedor';

    public function vendas() {
        return $this->hasMany(venda::class, 'vendedor_id');
    }

}
