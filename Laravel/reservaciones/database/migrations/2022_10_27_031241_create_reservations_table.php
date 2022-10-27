<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('client_name'); //Esto se cambiara por la id del cliente y sera una llave foranea
            $table->string('id_room'); //Esto se cambiara por la id de la habitación y sera una llave foranea
            $table->string('type');
            $table->string('floor');
            $table->string('date_reserv');
            $table->string('date_end');
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
