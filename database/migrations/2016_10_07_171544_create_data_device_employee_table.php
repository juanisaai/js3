<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataDeviceEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_device_employee', function (Blueprint $table) {

            $table->primary('employee_id', 'data_device_id');

            $table->integer('employee_id')->unsigned()->nullable();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //relationship with dataDevices->id

            $table->integer('data_device_id')->unsigned()->nullable();

            $table->foreign('data_device_id')
                ->references('id')
                ->on('dataDevices')
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
        Schema::drop('data_device_employee');
    }
}
