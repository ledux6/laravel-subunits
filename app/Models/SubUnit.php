<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubUnit extends Model
{
    use HasFactory;

    protected $guarded = []; 
    public $timestamps = false;


    public function mainTruck(): HasOne
    {
        return $this->hasOne(Truck::class,'id', 'main_truck_id');
    }

    public function subUnit(): HasOne
    {
        return $this->hasOne(Truck::class, 'id', 'sub_unit_id');
    }
}
