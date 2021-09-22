<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electronic_report extends Model
{
    use HasFactory;
    protected $fillable=['sale_id'];
    //Relacion uno a uno inverso Sale-Electronic_report
    public function sale()
    {
        return $this->belongsTo("App\Models\Sale");
    }
}
