<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("order_id")->nullable();
            $table->integer("product_id")->nullable();
            $table->integer("qty")->nullable();
            $table->decimal("order_price", 10, 2)->nullable();
            $table->decimal("order_subtotal", 10, 2)->nullable();
            $table->timestamps();

            $table->foreign("order_id")->references("id")->on("orders")->onDelete("cascade");
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
