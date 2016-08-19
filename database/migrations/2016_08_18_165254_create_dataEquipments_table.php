<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataEquipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TypeEquiment', 15);
            $table->string('TypeAssemblyEquipment', 15);
            $table->string('BrandEquipment', 15)->nullable();
            $table->string('ModelEquipment', 25)->nullable();
            $table->string('ColorEquipment', 15);
            $table->string('InventoryNumberEquipment', 25);
            $table->string('SerialNumberEquipment', 15);
            $table->string('OSEquipment', 40);
            $table->string('NomenclatureEquipment', 20);
            $table->string('IPAddressEquipment', 25);
            $table->string('BrandMotherB', 50);
            $table->string('ModelMotherB', 50);
            $table->string('SerialNumberMotherB', 50);
            $table->string('BrandCPU', 50);
            $table->string('ModelCPU', 50);
            $table->string('FrequencyCPU', 30);
            $table->string('BrandRam', 50);
            $table->string('TypeRam', 50);
            $table->string('CapabilityRam', 30);
            $table->string('TypeHHD', 25);
            $table->string('BrandHHD', 50);
            $table->string('ModelHHD', 50);
            $table->string('CapabilityHHD', 25);
            $table->string('SerialNumberHHD', 50);
            $table->string('BrandDiscReader', 50);
            $table->string('TypeDiscReader', 25);
            $table->timestamps();

            //relationship with Suppliers->id

            $table->integer('supplier_id')->unsigned();

            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
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
        Schema::drop('dataEquipments');
    }
}
