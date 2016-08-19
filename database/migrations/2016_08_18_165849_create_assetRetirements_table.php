<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetRetirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assetRetirements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('FolioNumberD')->unique()->index();
            $table->longText('CausesLow');
            $table->boolean('DictumTechnical');
            $table->boolean('Photography');
            $table->boolean('HighAsset');
            $table->date('DateLow');
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
        Schema::drop('assetRetirements');
    }
}
