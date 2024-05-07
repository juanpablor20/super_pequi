<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('disabilities', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->enum('status', ['activo', 'inactivo']);
            $table->timestamp('punishment_date')->useCurrent();
            $table->timestamp('end_date')->useCurrent();
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
