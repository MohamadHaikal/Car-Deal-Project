<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientVehicle extends Model
{
    public function vehicle(){
        return $this->belongsTo('App\Models\Vehicle' , 'vehicle_id');
    }

}
