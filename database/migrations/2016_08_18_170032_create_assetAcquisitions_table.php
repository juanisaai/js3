<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetAcquisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assetAcquisitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('FolioNumberU')->unique()->index();
            $table->date('DateHighAsset');
            $table->string('Program', 40);
            $table->timestamps();

            //relationship with dataSafeguards->id

            $table->integer('dataSafeguard_id')->unsigned();

            $table->foreign('dataSafeguard_id')
                ->references('id')
                ->on('dataSafeguards')
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
        Schema::drop('assetAcquisitions');
    }
}
