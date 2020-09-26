<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_headers', function (Blueprint $table) {
            $table->id();
            $table->char('contract_id')
                ->index();
            $table->char('contract_number')->index();
            $table->char('lease_item_name');
            $table->foreignId('asset_class_id')->constrained();
            $table->foreignId('profit_center_id')->constrained();
            $table->foreignId('accounting_area_id')->constrained();
            $table->foreignId('cost_center_id')->constrained();
            $table->foreignId('business_unit_id')->constrained();
            $table->foreignId('contract_lessor_id')->constrained();
            $table->text('internal_order');
            $table->date('begin_date')->index();
            $table->date('end_date')->index();
            $table->enum('term_of_payment',['monthly','bimonthly','trimonthly','quarterly','halfyear','annual']);
            $table->integer('regular_contract_term')->nullable();
            $table->foreignId('country_id')->constrained()->comment('Currency');
            $table->float('interest_rate')->default(0.0);
            $table->float('residual_value')->default(0.0);
            $table->float('contingency_liability')->default(0.0);
            $table->float('payment')->default(0.0);
            $table->float('capitalized_expense')->default(0.0);
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('contract_headers');
    }
}
