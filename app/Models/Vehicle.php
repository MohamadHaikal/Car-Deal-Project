<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable =[
        "description",
        "is_available",
        "engine_force",
        "fuel",
        "kilometrage",
        "max_speed",
        "status",
        "price",
        "has_offer",
        "price_after_offer",
        "rent_price",
        "origin_country",
        "transmission",
        "exterior_color",
        "interior_color",
        "year",
        "body",
        "service_type",
        "rating_id",
        "brand_id",
        "special_offer_id",];

        /////// Has_many Relations ///////
        public function galleries(){
            return $this->hasMany('App\Models\Gallery' , 'vehicle_id');
        }

        public function logs(){
            return $this->hasMany('App\Models\Log' , 'vehicle_id');
        }

        public function requestTable(){
            return $this->hasMany('App\Models\RequestTable' , 'vehicle_id');
        }

        public function contractBuy(){
            return $this->hasMany('App\Models\ContractBuy' , 'vehicle_id');
        }

        public function contractRent(){
            return $this->hasMany('App\Models\ContractRent' , 'vehicle_id');
        }

        public function reportStatus(){
            return $this->hasMany('App\Models\ReportStatus' , 'vehicle_id');
        }


        ////////////// Belongs_To Relations ////////////////
        public function brand(){
            return $this->belongsTo('App\Models\Brand' , 'brand_id');
        }

        public function rating(){
            return $this->belongsTo('App\Models\Rating' , 'rating_id');
        }

        public function specialOffer(){
            return $this->belongsTo('App\Models\SpecialOffer' , 'special_offer_id');
        }


      

}
