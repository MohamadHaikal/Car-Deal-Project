<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialOffer extends Model
{
    protected $fillable =[
        "description",
        "ratio",
        "start_date",
        "end_date",];

    public function vehicles(){
        return $this->hasMany('App\Models\Vehicle' , 'special_offer_id');
    }
}
