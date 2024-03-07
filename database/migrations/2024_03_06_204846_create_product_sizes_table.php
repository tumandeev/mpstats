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
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->id("optionId");
            $table->string("name");
            $table->string("origName");
            $table->integer("rank");
            $table->integer("wh");
            $table->integer("dtype");
            $table->integer("returnCost");
            $table->string("priceU")->nullable();
            $table->integer("salePriceU")->nullable();
            $table->integer("sale")->nullable();
            $table->integer("logisticsCost")->nullable();
            $table->string("sign");
            $table->string("payload");

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sizes');
    }
};
