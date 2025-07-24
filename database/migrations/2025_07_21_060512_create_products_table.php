<?php

use App\Models\WebsiteCategory;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke User
            $table->foreignId('website_category_id')->constrained()->onDelete('cascade'); // Relasi ke Category
            $table->string('title');
            $table->string('meta_desc');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->string('image')->nullable(); // Gambar artikel, bisa null
            $table->boolean('status')->default(false); // false = draft, true = published

            // tabel harga
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->string('sku')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
