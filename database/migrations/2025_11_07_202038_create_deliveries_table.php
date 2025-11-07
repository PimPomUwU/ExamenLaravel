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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('gender');
            $table->string('birth_date');
            $table->string('vehicle_type');
            $table->string('dni_document_front');
            $table->string('dni_document_back');
            $table->string('driving_license');
            $table->string('transit_license');
            $table->string('mandatory_insurance');
            $table->string('profile_photo');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
