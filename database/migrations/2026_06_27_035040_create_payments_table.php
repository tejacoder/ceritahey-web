<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->string('reference')->unique()->nullable();
            $table->string('tripay_reference')->nullable();
            $table->string('method', 50)->nullable();
            $table->string('channel', 50)->nullable();
            $table->bigInteger('amount');
            $table->bigInteger('fee')->default(0);
            $table->bigInteger('total')->default(0);
            $table->string('status', 20)->default('pending'); // pending, paid, expired, failed
            $table->string('paid_at')->nullable();
            $table->text('payload')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
