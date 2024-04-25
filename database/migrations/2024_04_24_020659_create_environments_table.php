<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('environments', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->enum('states', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('environments');
    }
};
