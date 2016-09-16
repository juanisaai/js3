<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataDevices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TypeDevice', 50);
            $table->string('ModelDevice', 50);
            $table->string('BrandDevice', 50);
            $table->string('ColorDevice', 25);
            $table->string('NomenclatureDevice', 20);
            $table->string('SerialNumberDevice', 25);
            $table->string('InventoryNumberDevice', 25);
            $table->timestamps();

            //relationship with Suppliers->id

            $table->integer('supplier_id')->unsigned();

            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dataDevices');
    }
}
