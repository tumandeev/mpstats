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
        Schema::create('product_collection_product_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_colors_id")->references("id")->on("product_colors")->onDelete('cascade');
            $table->foreignId("product_collection_id")->references("item_id")->on("product_collections")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_collection_product_colors');
    }
};
