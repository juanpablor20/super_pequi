<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('names', 60);
            $table->string('last_name', 60);
            $table->string('type_identification', 60);
            $table->string('number_identification', 60)->unique();
            $table->string('sex_user', 60);
            $table->string('gender_sex', 60);
            $table->enum('states', ['active', 'con_equipo', 'inactive', 'reportado'])->default('active');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
