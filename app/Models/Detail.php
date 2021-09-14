<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = ['cantidad', 'utilidad','venta_id','medicamento_id','tipo'];
    use HasFactory;

    public function medicamento(){
        return $this->belongsTo('App\Models\Medicamento');
    }
}
