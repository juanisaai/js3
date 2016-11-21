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
            $table->mediumText('ReasonRequests', 1000);
            $table->string('receptionist', 60);
            $table->string('DescriptionService', 1000);
            $table->string('TechnicianAssigned', 60);
            $table->timestamps();

            $table->integer('employee_id')->unsigned()->nullable();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
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
        Schema::drop('serviceRequests');
    }
}
