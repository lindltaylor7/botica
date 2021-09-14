<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{

    use HasFactory;
    protected $fillable = ['codigo', 'utilidad', 'fecha', 'cliente_id', 'vendedor'];
    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    

}
