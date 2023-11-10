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
        Schema::create('tbluser', function (Blueprint $table) {
            $table->id();
            $table->string('user_fullname');
            $table->string('user_gmail')->unique();
            $table->string('user_password');
            $table->string('google_id')->unique();
            $table->string('user_address')->nullable();
            $table->string('user_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbluser');
    }
};
