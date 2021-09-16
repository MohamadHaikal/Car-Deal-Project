<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractRent extends Model
{
    protected $fillable =[
        "start_date",
        "end_date",
        "client_id",
        "vehicle_id"];


    ////////////// Belongs_To Relations ////////////////
    public function vehicle(){
        return $this->belongsTo('App\Models\Vehicle' , 'vehicle_id');
    }

    public function client(){
        return $this->belongsTo('App\Models\Client' , 'client_id');
    }

}
