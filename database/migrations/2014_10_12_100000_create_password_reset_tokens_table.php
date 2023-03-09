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
<<<<<<<< Updated upstream:database/migrations/2014_10_12_100000_create_password_reset_tokens_table.php
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
========
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('detail');
            $table->timestamps();
>>>>>>>> Stashed changes:database/migrations/2023_03_08_140842_create_facilities_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< Updated upstream:database/migrations/2014_10_12_100000_create_password_reset_tokens_table.php
        Schema::dropIfExists('password_reset_tokens');
========
        Schema::dropIfExists('facilities');
>>>>>>>> Stashed changes:database/migrations/2023_03_08_140842_create_facilities_table.php
    }
};
