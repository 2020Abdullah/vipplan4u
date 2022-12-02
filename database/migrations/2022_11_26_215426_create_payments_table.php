<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_deposited_amount');
            $table->string('Proof_img');
            // $table->string('payment_method');

            $table->string('status')->default('inactive');
            $table->foreignId('payment_method_id')->references('id')->on('payment_methods')->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('account_id')->references('id')->on('accounts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('package_id')->references('id')->on('packages')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('payments');
    }
}
