<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignDevices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            /*relationship with Areas->id

            $table->integer('area_id')->unsigned();

            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
             */
            //relationship with Employee->id

            $table->integer('employee_id')->unsigned()->nullable();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('set null')
                ->onUpdate('cascade');

            //relationship with dataDevices->id

            $table->integer('dataDevices_id')->unsigned()->nullable();

            $table->foreign('dataDevices_id')
                ->references('id')
                ->on('dataDevices')
                ->onDelete('set null')
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
        Schema::drop('assignDevices');
    }
}
