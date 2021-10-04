<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['ruc','type','code','date','seller','customer_id','igv','total_utility','total_sale'];

    //Relación de uno a muchos Sale-Detail
    public function details() {
        return $this->hasMany("App\Models\Detail");
    }

    //Relacion inversa de uno a muchos Customer-Sale
    public function customer() {
        return $this->belongsTo("App\Models\Customer");
    }
    //Relacion uno a uno Sale-Electronic_report
    public function electronic_report()
    {
        return $this->hasOne("App\Models\Electronic_report");
    }
}
