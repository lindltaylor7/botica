<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable=['quantity','unit_type_id','detailable_id','detailable_type','sale_id','amount','partial_igv','partial_utility','partial_sale'];
    //Relacion inversa de uno a muchos Unit_type-Price
    public function unit_type() {
        return $this->belongsTo("App\Models\Unit_type");
    }
    //Relacion inversa de uno a muchos Sale-Detail
    public function sale() {
        return $this->belongsTo("App\Models\Sale");
    }
    //Relacion polimorfica de uno a muchos Price-Medicine-Articles
    public function detailable()
    {
        return $this->morphTo();
    }
    //muchos a muchos
    public function batches(){
        return $this->belongsToMany("App\Models\Batch")->withPivot('quantity_sale');
    }

}
