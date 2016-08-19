<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataSafeguardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataSafeguards', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('DescriptionAsset');
            $table->string('BrandAsset', 50);
            $table->string('ModelAsset', 50);
            $table->string('SerialNumberAsset', 50);
            $table->longText('FurtherDescAsset')->nullable();
            $table->string('ColorAsset', 20);
            $table->string('StatusAsset', 25);
            $table->string('PlacementAsset', 150);
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
        Schema::drop('dataSafeguards');
    }
}
