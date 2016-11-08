<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLowInventoryEqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('low_inventory_eqs', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('CauseLow', 1000);
            $table->boolean('TechnicianDictum')->default(false);
            $table->boolean('Picture')->default(false);
            $table->boolean('UpInventory')->default(false);
            $table->timestamps();

            $table->integer('equipment_id')->unsigned();

            $table->foreign('equipment_id')
                ->references('id')
                ->on('dataEquipments')
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
        Schema::drop('low_inventory_eqs');
    }
}
