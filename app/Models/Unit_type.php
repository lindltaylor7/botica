<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit_type extends Model
{
    use HasFactory;
    protected $fillable=['unit_type'];
    //Relación de uno a muchos Unit_type-Price
    public function prices() {
        return $this->hasMany("App\Models\Price");
    }
     //Relación de uno a muchos Unit_type-Detail
     public function details() {
        return $this->hasMany("App\Models\Detail");
    }

}
