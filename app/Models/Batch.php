<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $fillable=['code','entry_date','expiry_date','cost_box','quantity_box','quantity_unit','stock_id'];

    //Relacion inversa de uno a muchos Stock-Batch
    public function stock() {
        return $this->belongsTo("App\Models\Stock");
    }
    //muchos a muchos
    public function details(){
        return $this->belongsToMany("App\Models\Detail");
    }
}
