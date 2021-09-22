<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable=['quantity','shelf','stockable_id','stockable_type'];
    //Relación de uno a muchos Stock-Batchs
    public function batches() {
        return $this->hasMany("App\Models\Batch");
    }

    //Relacion polimorfica de uno a muchos Sotck-Medicine-Articles
    public function stockable()
    {
        return $this->morphTo();
    }
}
