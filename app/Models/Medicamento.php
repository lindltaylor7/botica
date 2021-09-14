<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Medicamento extends Model
{
    protected $fillable=['n_generico','n_comercial', 'concent','anaquel', 'present', 'lab', 'img', 'nro_caja','type'];

    public function stocks(){
        return $this->hasMany('App\Models\Stock');
    }

    public function precio(){
        return $this->hasOne('App\Models\Precio');
    }

    public function detail(){
        return $this->hasMany('App\Models\Detail');
    }

    use HasFactory;
}
