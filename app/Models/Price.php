<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    
    protected $fillable = ['cost_price', 'utility', 'sale_price','priceable_id','priceable_type'];

    //Relacion inversa de uno a muchos Unit_type-Price
    public function unit_type() {
        return $this->belongsTo("App\Models\Unit_type");
    }
    //Relacion polimorfica de uno a muchos Price-Medicine-Articles
    public function priceable()
    {
        return $this->morphTo();
    }
}
