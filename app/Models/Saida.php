<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    protected $fillable = [
        'id_cliente',
        'id_produto',
        'quantidade'
    ];
}
