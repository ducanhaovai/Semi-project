<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
            $table->string('email')->unique();
<<<<<<< HEAD
<<<<<<< Updated upstream
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
=======
            $table->string('avatar')->nullable();
            $table->string('type')->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
>>>>>>> Stashed changes
            $table->rememberToken();
=======
            $table->string('password');
            $table->string('remember_token')->nullable();
>>>>>>> HongPhuc
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
