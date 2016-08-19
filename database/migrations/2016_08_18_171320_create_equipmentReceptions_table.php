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
            $table->enum('TypeTrouble', ['Harware', 'Software']);
            $table->string('ReasonReception', 500);
            $table->string('ObservationReception', 500);
            $table->string('Receptionist', 60);
            $table->string('Petitioner', 60);
            $table->string('Receive', 60);
            $table->enum('StatusEquipment', ['Ready', 'GenerateDictum']);
            $table->integer('NumberDictum');
            $table->timestamps();

            //relationship with assignDevices->id

            $table->integer('assignDevices_id')->unsigned();

            $table->foreign('assignDevices_id')
                ->references('id')
                ->on('assignDevices')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //relationship with assignEquipments->id

            $table->integer('assignEquipments_id')->unsigned();

            $table->foreign('assignEquipments_id')
                ->references('id')
                ->on('assignEquipments')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
