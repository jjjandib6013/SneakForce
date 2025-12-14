<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Order information
            $table->string('payment_method'); // e.g., COD, Credit Card, GCash
            $table->decimal('total', 10, 2);

            // Shipping information
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');

            $table->string('status')->default('pending'); // pending, paid, shipped, delivered

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
