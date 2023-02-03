<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            // $table->unsignedBigInteger('transaksi_id');
            $table->string('number')->unique();
            $table->decimal('amount', 16, 2)->default(0);
            $table->string('method');
            $table->string('status')->nullable();
            $table->string('token')->nullable();
            $table->json('payloads')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('va_number')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('biller_code')->nullable();
            $table->string('bill_key')->nullable();
            $table->timestamps();
            $table->foreignId('transaksi_id')->constrained('transaksi')->cascadeOnDelete();
            $table->index('number');
            $table->index('method');
            $table->index('token');
            $table->index('payment_type');
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
};