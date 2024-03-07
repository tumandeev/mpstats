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
        Schema::create('product_collection_product_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_sizes_id")->references("optionId")->on("product_sizes")->onDelete('cascade');
            $table->unsignedBigInteger('product_collection_item_id');
            $table->foreign("product_collection_item_id", "product_collection_item_id_foreign")->references("item_id")->on("product_collections")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_collection_product_sizes');
    }
};
