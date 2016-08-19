<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignEquipments', function (Blueprint $table) {
            $table->increments('id');

            //relationship with Areas->id

            $table->integer('area_id')->unsigned();

            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //relationship with Employee->id

            $table->integer('employee_id')->unsigned();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //relationship with dataEquipments->id

            $table->integer('dataEquipments_id')->unsigned();

            $table->foreign('dataEquipments_id')
                ->references('id')
                ->on('dataEquipments')
                ->onDelete('cascade')
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
        Schema::drop('assigEquipments');
    }
}
