<?php

use Faker\Provider\pl_PL\Payment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime('ordered at');
            $table->integer('total');
            $table->string('customer_name');
            $table->string('address');
            $table->enum('payment_method',['esewa','khalti','cod'])->default('cod');
            $table->enum('payment_status',['pending','cancelled','received'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};