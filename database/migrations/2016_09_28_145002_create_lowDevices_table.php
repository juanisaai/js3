<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLowDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowDevices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('FolioNumberD')->unique()->index();
            $table->longText('CausesLow');
            $table->boolean('DictumTechnical');
            $table->boolean('Photography');
            $table->boolean('HighAsset');
            $table->date('DateLow');
            $table->timestamps();

            //relationship with dataSafeguards->id

            $table->integer('assignDevices_id')->unsigned()->nullable();

            $table->foreign('assignDevices_id')
                ->references('id')
                ->on('assignDevices')
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
        Schema::drop('lowDevices');
    }
}
