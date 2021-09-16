<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Vehicle;
use App\Models\Rating;
use App\Models\SpecialOffer;
use App\Models\Brand;

use App\Http\Enums\Fuel;
use App\Http\Enums\Colors;
use App\Http\Enums\Bodies;
use App\Http\Enums\Conditions;
use App\Http\Enums\Transmissions;


class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text("description")->nullable();
            $table->boolean("is_available")->default('0');
            $table->integer("engine_force")->nullable();
            $table->enum('fuel', [Fuel::BENZIN, Fuel::DIESEL, Fuel::ELICTRIC, Fuel::OTHER])->default(Fuel::BENZIN);
            $table->integer("kilometrage")->nullable();
            $table->integer("max_speed")->nullable();
            $table->enum('status', [Conditions::NEW, Conditions::USED])->default(Conditions::NEW);
            $table->double("price")->nullable();
            $table->double("rent_price")->nullable();
            $table->boolean("has_offer")->default('0');
            $table->double("price_after_offer")->nullable();
            $table->string('origin_country')->nullable();
            $table->integer('year')->nullable();
            $table->string('service_type')->nullable();
            $table->enum('transmission', [Transmissions::MANUAL, Transmissions::AUTOMATIC, Transmissions::TIPTRONIC])->default(Transmissions::AUTOMATIC);
            $table->enum('interior_color', [Colors::RED, Colors::BLUE, Colors::GREEN, Colors::BLACK, Colors::WHITE, Colors::GRAY, Colors::YELLOW, Colors::PINK, Colors::PURPLE, Colors::BROWN, Colors::OTHER])->default(Colors::OTHER);
            $table->enum('exterior_color', [Colors::RED, Colors::BLUE, Colors::GREEN, Colors::BLACK, Colors::WHITE, Colors::GRAY, Colors::YELLOW, Colors::PINK, Colors::PURPLE, Colors::BROWN, Colors::OTHER])->default(Colors::OTHER);
            $table->enum('body', [Bodies::TWO_DOOR, Bodies::FOUR_DOOR, Bodies::SEDAN, Bodies::SUV, Bodies::SPORT, Bodies::HATCHBACK, Bodies::OTHER])->default(Bodies::OTHER);
            $table->bigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->bigInteger('special_offer_id')->unsigned();
            $table->foreign('special_offer_id')->references('id')->on('special_offers')->onDelete('cascade');

            $table->timestamps();
        });

        $vehicle = new Vehicle;
        $vehicle->description = "best car";
        $vehicle->is_available = "1";
        $vehicle->engine_force = "1600";
        $vehicle->fuel = "BENZIN";
        $vehicle->kilometrage = "120000";
        $vehicle->max_speed = "320";
        $vehicle->status = Conditions::NEW;
        $vehicle->price = "7000000";
        $vehicle->rent_price = "7000000";
        $vehicle->has_offer = "0";
        $vehicle->price_after_offer = "7000000";
        $vehicle->origin_country = "Germany";
        $vehicle->year = 2021;
        // $vehicle->service_type = buy;
        $vehicle->transmission = Transmissions::AUTOMATIC;
        $vehicle->exterior_color = Colors::RED;
        $vehicle->interior_color = Colors::RED;
        // $vehicle->rating_id = "1";
        $vehicle->brand_id = "1";
        $vehicle->special_offer_id = "1";
        $vehicle->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
