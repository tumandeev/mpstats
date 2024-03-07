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
        Schema::create('product_collections', function (Blueprint $table) {
            $table->id("item_id");
            $table->foreignId("collection_process_id")->references("id")->on("collection_processes");
            $table->integer("time1");
            $table->integer("time2");
            $table->integer("wh");
            $table->integer("dtype");
            $table->integer("dist");
            $table->bigInteger("id", false, true)->index();
            $table->integer("root");
            $table->integer("kindId");
            $table->string("brand");
            $table->integer("brandId");
            $table->integer("siteBrandId");
            $table->integer("subjectId");
            $table->integer("subjectParentId");
            $table->string("name");
            $table->string("supplier");
            $table->integer("supplierId");
            $table->integer("supplierRating");
            $table->integer("supplierFlags");
            $table->integer("priceU");
            $table->integer("salePriceU");
            $table->integer("sale");
            $table->integer("logisticsCost");
            $table->integer("returnCost");
            $table->boolean("diffPrice");
            $table->integer("saleConditions");
            $table->integer("pics");
            $table->integer("rating");
            $table->integer("reviewRating");
            $table->integer("feedbacks");
            $table->integer("panelPromoId")->nullable();
            $table->string("promoTextCard")->nullable();
            $table->string("promoTextCat")->nullable();
            $table->integer("volume");
            $table->integer("viewFlags");
            $table->json("log");
            $table->string("logs")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_collections');
    }
};
