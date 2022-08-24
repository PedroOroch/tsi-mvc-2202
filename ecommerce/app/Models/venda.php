<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venda extends Model
{
  
    use HasFactory;

    protected $fillable = [ 'id', 
                            'cliente_id',
                            'vendedo_id'];
    protected $table = 'venda';
}
