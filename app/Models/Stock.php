<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad', 'f_vencimiento', 'f_ingreso', 'lote', 'costo','medicamento_id','status'];

    public function medicamento(){
        return $this->belongsTo('App\Models\Medicamento');
    }

}
