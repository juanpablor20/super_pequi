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
        Schema::create('transfer_places', function (Blueprint $table) {
            $table->id();
            $table->string('places', 166);
            $table->unsignedBigInteger('places_id');

            $table->foreign('places_id')->references('id')->on('services')->onDelete('cascade');


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transfer_places');
    }
};
