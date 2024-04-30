<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('color_product', function (Blueprint $table) {
            $table->foreignId('color_id')->constrained('colors')->cascadeOnUpdate()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained('products')->cascadeOnUpdate()->cascadeOnUpdate();
            $table->primary(['color_id', 'product_id']);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_product');
    }
};
