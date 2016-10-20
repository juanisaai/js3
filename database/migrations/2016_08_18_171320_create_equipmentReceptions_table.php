<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipmentReceptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('FolioNumberR')->unique()->index();
            $table->dateTime('DateReception');
            $table->enum('TypeTrouble', ['Hardware', 'Software']);
            $table->string('ReasonReception', 500);
            $table->string('ObservationReception', 500);
            $table->string('Receptionist', 60);
            $table->string('Petitioner', 60);
            $table->string('Receive', 60);
            $table->enum('StatusEquipment', ['Ready', 'GenerateDictum']);
            $table->integer('NumberDictum');
            $table->timestamps();

            //relationship with assignDevices->id



            //relationship with assignEquipments->id



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipmentReceptions');
    }
}
