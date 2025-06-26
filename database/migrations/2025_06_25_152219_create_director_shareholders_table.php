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
        Schema::create('director_shareholders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_profile_id')->constrained()->onDelete('cascade');
            $table->string('fullname');
            $table->string('status'); // Bumiputera, Non-Bumiputera, Foreign
            $table->string('nric_passport');
            $table->string('designation');
            $table->string('email');
            $table->string('locality');
            $table->unsignedInteger('ordinary_shares');
            $table->unsignedInteger('preference_shares');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('director_shareholders');
    }
};
