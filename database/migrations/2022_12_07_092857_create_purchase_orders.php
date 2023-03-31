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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();

            $table->foreignUuid('company_id')->references('id')->on('companies')->cascadeOnUpdate()->cascadeOnDelete();

            $table->string('reference');
            $table->string('status');

            $table->date('paid_at')->nullable();
            $table->date('shipped_at')->nullable();
            $table->date('target_delivery_date_at')->nullable();
            $table->timestamp('shipping_email_sent_at')->nullable();

            $table->decimal('vat_percentage');
            $table->decimal('discount_percentage');
            $table->decimal('discount_amount');

            $table->string('shipping_address_line_1')->nullable();
            $table->string('shipping_address_line_2')->nullable();
            $table->string('shipping_zip_code')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_region')->nullable();
            $table->string('shipping_country')->nullable();

            $table->string('billing_address_line_1')->nullable();
            $table->string('billing_address_line_2')->nullable();
            $table->string('billing_zip_code')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_region')->nullable();
            $table->string('billing_country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
