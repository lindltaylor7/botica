<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable=['generic_name','tradename','concentration','presentation','laboratory', 'number_box', 'number_blister'];

     // relacion polimorfica de uno a uno Article-Image
    public function image(){
        return $this->morphOne('App\Models\Image','imageable');
        }

     //Relacion POLIMORFICA de uno a muchos Medicine-Stock
     public function stocks(){
        return $this->morphMany('App\Models\Stock','stockable');
    }
    //Relacion POLIMORFICA de uno a muchos Article-Price
    public function price(){
        return $this->morphOne('App\Models\Price','priceable');
    }
    //Relacion POLIMORFICA de uno a muchos Medicine-Detail
    public function details(){
        return $this->morphMany('App\Models\Detail','detailable');
    }

    public function scopeBuscar($query, $buscar)
    {
        if ($buscar)
        {
            return $query->where('medicines.generic_name','like',"%$buscar%")->orWhere('medicines.tradename','like',"%$buscar%")->orWhere('medicines.laboratory','like',"%$buscar%");
        }
    }
}
