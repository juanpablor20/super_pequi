<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('services_uniones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('services_id');
            $table->unsignedBigInteger('equipment_id');


            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');

            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('services_uniones');
    }
};
