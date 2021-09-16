<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RequestTable extends Model
{
    protected $fillable =[
        "date",
        "type",
        "start_date",
        "end_date",
        "client_id",
        "vehicle_id",
        'status'
    ];
   ////////////// Belongs_To Relations ////////////////
   public function vehicle(){
    return $this->belongsTo('App\Models\Vehicle' , 'vehicle_id');
}

public function client(){
    return $this->belongsTo('App\Models\Client' , 'client_id');
}

}
