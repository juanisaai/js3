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
            $table->string('InventoryNumberDevice', 25)->nullable();
            $table->string('NomenclatureDevice', 20)->nullable();
            $table->enum('DescriptionDevice', ['Red', 'Impresora']);
            $table->string('TypeDevice', 50);
            $table->string('BrandDevice', 50)->nullable();
            $table->string('ModelDevice', 50)->nullable();
            $table->string('SerialNumberDevice', 25)->nullable();
            $table->string('ColorDevice', 25);
            $table->longText('DescriptionAdDevice')->nullable();
            $table->boolean('active')->default(true);

            $table->integer('employee_id')->unsigned()->nullable();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('set null')
                ->onUpdate('cascade');

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
        Schema::drop('dataDevices');
    }
}
