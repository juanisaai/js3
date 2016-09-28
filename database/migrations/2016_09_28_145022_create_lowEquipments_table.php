<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLowEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowEquipments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('FolioNumberE')->unique()->index();
            $table->longText('CausesLow');
            $table->boolean('DictumTechnical');
            $table->boolean('Photography');
            $table->boolean('HighAsset');
            $table->date('DateLow');
            $table->timestamps();

            //relationship with dataSafeguards->id

            $table->integer('assignEquipments_id')->unsigned()->nullable();

            $table->foreign('assignEquipments_id')
                ->references('id')
                ->on('assignEquipments')
                ->onDelete('set null')
                ->onUpdate('cascade');

            //relationship with Employee->id

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
        Schema::drop('lowEquipments');
    }
}
