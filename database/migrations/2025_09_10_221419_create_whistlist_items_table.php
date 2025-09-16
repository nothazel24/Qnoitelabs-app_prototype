<?php

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
        Schema::create('whistlist_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('whistlist_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->decimal('price_at_add', 10, 2);
            $table->decimal('discount_at_add', 10, 2)->nullable()->default(0);
            $table->timestamps();

            $table->unique(['whistlist_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whistlist_items');
    }
};
