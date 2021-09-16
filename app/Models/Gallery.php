<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable =[
        "image", 
        "vehicle_id"];


    ////////////// Belongs_To Relations ////////////////
    public function vehicle(){
        return $this->belongsTo('App\Models\Vehicle' , 'vehicle_id');
    }    
}
