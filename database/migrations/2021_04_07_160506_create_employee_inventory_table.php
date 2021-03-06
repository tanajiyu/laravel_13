<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_inventory', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->unsigned();
            $table->integer('inventory_id')->unsigned();
            $table->string('description');
            $table->timestamps();
        });

        Schema::table('employee_inventory', function (Blueprint $table) {
            $table->foreign('employee_id')
            ->references('id')->on('employees');
        });

        Schema::table('employee_inventory', function (Blueprint $table) {
            $table->foreign('inventory_id')
            ->references('id')->on('inventories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_inventory');
    }
}
