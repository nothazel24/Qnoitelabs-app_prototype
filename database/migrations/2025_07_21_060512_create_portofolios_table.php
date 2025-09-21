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
        Schema::create('portofolios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('website_category_id')->constrained()->onDelete('cascade'); // Relasi ke Category
            $table->string('title');
            $table->string('meta_desc');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->string('image')->nullable();
            $table->boolean('status')->default(false); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolios');
    }
};
