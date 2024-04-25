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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('email_con');
            $table->string('telephone_con');
            $table->unsignedBigInteger('id_user_con');
            $table->foreign('id_user_con')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
