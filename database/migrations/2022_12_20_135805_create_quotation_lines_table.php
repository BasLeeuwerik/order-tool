<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('quotation_lines', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();

            $table->foreignUuid('quotation_id')->references('id')->on('quotations');
            $table->foreignUuid('quotation_product_id')->nullable()->references('id')->on('quotation_line_products');

            $table->string('description');
            $table->string('quantity');
            $table->string('first_option');
            $table->string('second_option');
            $table->string('third_option');
            $table->boolean('has_extra');
            $table->boolean('has_speed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('quotation_lines');
    }
};
