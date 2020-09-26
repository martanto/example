<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_details', function (Blueprint $table) {
            $table->id();
            $table->char('contract_id')
                ->index();
            $table->foreign('contract_id')
                ->references('contract_id')
                ->on('contract_headers');
            $table->integer('periode');
            $table->float('beginning_balance_liability');
            $table->float('payment');
            $table->float('non_leased_expense');
            $table->float('interest_amount');
            $table->float('principal_amount');
            $table->float('ending_balance_liability');
            $table->float('beginning_balance_assset');
            $table->float('depreciation');
            $table->float('ending_balance_assset');
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
        Schema::dropIfExists('contract_details');
    }
}
