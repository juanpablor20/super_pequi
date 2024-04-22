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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('return_date')->nullable();
            $table->timestamp('date_ser')->useCurrent();
            $table->enum('state_ser', ['prestado', 'devuelto']);
            $table->foreignId('librarian_pres_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('librarian_return_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('equipment_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');



            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
