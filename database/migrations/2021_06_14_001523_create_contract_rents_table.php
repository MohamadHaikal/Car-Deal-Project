<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ContractRent;
use App\Models\Vehicle;
use App\Models\Client;


class CreateContractRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_rents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->double("rent_price")->nullable();

            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->bigInteger('vehicle_id')->unsigned();
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');


            $table->timestamps();
        });

        $contract_rent = new ContractRent;
        $contract_rent->start_date = "2021/8/1";
        $contract_rent->end_date = "2021/8/30";
        $contract_rent->rent_price = "150";
        $contract_rent->client_id = "1";
        $contract_rent->vehicle_id = "1";
        $contract_rent->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_rents');
    }
}
