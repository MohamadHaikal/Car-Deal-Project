<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ReportStatus extends Model
{
    protected $fillable =[
        "content",
        "date", 
        "client_id",
        "vehicle_id",
        "request_table_id",];

    ////////////// Belongs_To Relations ////////////////
    public function vehicle(){
        return $this->belongsTo('App\Models\Vehicle' , 'vehicle_id');
    }

    public function client(){
        return $this->belongsTo('App\Models\Client' , 'client_id');
    }

    public function requestTable(){
        return $this->belongsTo('App\Models\RequestTable' , 'request_table_id');
    }

}
