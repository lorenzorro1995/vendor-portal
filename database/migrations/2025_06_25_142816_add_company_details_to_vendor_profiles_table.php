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
        Schema::table('vendor_profiles', function (Blueprint $table) {
            $table->string('company_phone')->nullable()->after('company_profile');
            $table->string('company_email')->nullable()->after('company_phone');
            $table->string('company_fax')->nullable()->after('company_email');
            $table->string('company_registration_number')->nullable()->after('company_fax');
            $table->string('company_type')->nullable()->after('company_registration_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendor_profiles', function (Blueprint $table) {
            //
        });
    }
};
