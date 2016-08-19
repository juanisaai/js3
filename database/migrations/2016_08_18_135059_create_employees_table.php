<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ProfileEmployee', 10);
            $table->string('FirtsName', 50);
            $table->string('SecondName', 50);
            $table->string('RoleEmployee', 20);
            $table->timestamps();

            //relationship with Areas->id

            $table->integer('area_id')->unsigned();

            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
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
        Schema::drop('employees');
    }
}
