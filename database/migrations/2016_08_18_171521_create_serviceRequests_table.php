<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceRequests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('FolioNumberS')->unique()->index();
            $table->date('DateServiceRequest');
            $table->time('HourServiceRequests');
            $table->mediumText('ReasonRequests');
            $table->string('Recepcionist', 60);
            $table->string('TechnicianAssigned', 60);
            $table->timestamps();

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

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('serviceRequests');
    }
}
