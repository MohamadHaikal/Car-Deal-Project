<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use Notifiable;

    protected $table = 'clients';

    protected $fillable =[
        "first_name",
        "last_name",
        "username",
        "email",
        "password",
        "phone",
        "address",
        "photo",];

        protected $hidden = [
          'password', 'remember_token',
      ];



         ///////////////// Has_many Relations ///////////////
        public function logs(){
            return $this->hasMany('App\Models\Log' , 'client_id');
        }

        public function requestTable(){
            return $this->hasMany('App\Models\RequestTable' , 'client_id');
        }

        public function contractBuy(){
            return $this->hasMany('App\Models\ContractBuy' , 'client_id');
        }

        public function contractRent(){
            return $this->hasMany('App\Models\ContractRent' , 'client_id');
        }

        public function reportStatus(){
            return $this->hasMany('App\Models\ReportStatus' , 'client_id');
        }


      
}
