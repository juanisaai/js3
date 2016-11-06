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
            $table->enum('TypeTrouble', ['Hardware', 'Software']);
            $table->string('ReasonReception', 500);
            $table->string('ObservationReception', 500);
            $table->string('Receptionist', 60);
            $table->string('Petitioner', 60);
            $table->string('Receive', 60);
            $table->enum('StatusEquipment', ['Ready', 'GenerateDictum'])->nullable();
            $table->integer('NumberDictum')->nullable();
            $table->timestamps();

            //relationship with dataDevices->id
            $table->integer('device_id')->unsigned()->nullable();

            $table->foreign('device_id')
                ->references('id')
                ->on('dataDevices')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //relationship with dataEquipment->id
            $table->integer('equipment_id')->unsigned()->nullable();

            $table->foreign('equipment_id')
                ->references('id')
                ->on('dataEquipments')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('user_id')->unsigned()->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
