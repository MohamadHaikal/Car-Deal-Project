<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable =[
        "name",
        "model",
        "logo",];


    public function vehicles(){
            return $this->hasMany('App\Models\Vehicle' , 'brand_id');
        }

}
