<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePvUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pv_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contract_detail_id')->constrained();
            $table->integer('periode');
            $table->integer('new_periode');
            $table->float('percentage_of_new_contract');
            $table->float('installment_per_period');
            $table->integer('present_value_per_period');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('pv_updates');
    }
}
