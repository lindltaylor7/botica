<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;

    protected $fillable = ['p_unitario', 'p_costo', 'p_caja', 'utilidad', 'p_venta_caja', 'medicamento_id', 'utilidad_caja'];

    public function medicamento(){
        return $this->belongsTo('App\Models\Medicamento');
    }

}
