<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'dni'];
    
    //Relación de uno a muchos Customer-Sale
    public function sales() {
        return $this->hasMany("App\Models\Sale");
    }
}
