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
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->softDeletes();

            $table->string('status');

            $table->integer('number')->unique();
            $table->integer('number_date')->nullable();
            $table->integer('number_count')->nullable();

            $table->integer('vat_percentage');

            $table->foreignUuid('sender_id')->nullable()->references('id')->on('companies')->nullOnDelete()->onUpdate('cascade');
            $table->string('sender_vat_number')->nullable();
            $table->string('sender_coc_number')->nullable();
            $table->string('sender_name');
            $table->string('sender_address');
            $table->string('sender_zip_code');
            $table->string('sender_city');
            $table->string('sender_country');

            $table->foreignUuid('receiver_id')->nullable()->references('id')->on('companies')->nullOnDelete()->onUpdate('cascade');
            $table->string('receiver_vat_number')->nullable();
            $table->string('receiver_coc_number')->nullable();
            $table->string('receiver_name');
            $table->string('receiver_address');
            $table->string('receiver_zip_code');
            $table->string('receiver_city');
            $table->string('receiver_country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
