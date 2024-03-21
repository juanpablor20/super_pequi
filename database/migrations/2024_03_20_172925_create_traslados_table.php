<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('traslados', function (Blueprint $table) {
            $table->id();
            $table->string('lugar_tras');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('traslados');
    }
};
