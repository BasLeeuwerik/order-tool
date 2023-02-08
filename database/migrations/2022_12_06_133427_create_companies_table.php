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
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();

            $table->string('type');

            $table->string('name');
            $table->string('email')->nullable();

            $table->string('phone_country_code')->nullable();
            $table->string('phone_number')->nullable();

            $table->string('website')->nullable();
            $table->string('legal_owner')->nullable();

            $table->string('vat_number')->nullable();
            $table->string('coc_number')->nullable();
            $table->string('iban_number')->nullable();
            $table->string('bic_number')->nullable();

            $table->timestamp('vat_number_validated_at')->nullable();

            $table->decimal('discount_percentage')->nullable();
            $table->decimal('discount_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
