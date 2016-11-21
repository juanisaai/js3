<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataDictaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_dictum', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Problematic');
            $table->string('Dictum');
            $table->string('Recommendation');
            $table->string('observations');

            $table->integer('device_id')->unsigned()->nullable();

            $table->foreign('device_id')
                ->references('id')
                ->on('dataDevices')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->integer('equipment_id')->unsigned()->nullable();

            $table->foreign('equipment_id')
                ->references('id')
                ->on('dataEquipments')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->integer('user_id')->unsigned()->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('data_dictum');
    }
}
