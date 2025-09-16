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
            // Current Year
            $table->year('current_financial_year')->nullable()->after('company_type');
            $table->decimal('current_assets', 15, 2)->nullable()->after('current_financial_year');
            $table->decimal('current_non_current_assets', 15, 2)->nullable()->after('current_assets');
            $table->decimal('current_total_assets', 15, 2)->nullable()->after('current_non_current_assets');
            $table->decimal('current_current_liabilities', 15, 2)->nullable()->after('current_total_assets');
            $table->decimal('current_non_current_liabilities', 15, 2)->nullable()->after('current_current_liabilities');
            $table->decimal('current_total_liabilities', 15, 2)->nullable()->after('current_non_current_liabilities');
            $table->decimal('current_total_equity', 15, 2)->nullable()->after('current_total_liabilities');
            $table->decimal('current_retained_earnings', 15, 2)->nullable()->after('current_total_equity');
            $table->decimal('current_revenue', 15, 2)->nullable()->after('current_retained_earnings');
            $table->decimal('current_cost_of_sales', 15, 2)->nullable()->after('current_revenue');
            $table->decimal('current_gross_profit_loss', 15, 2)->nullable()->after('current_cost_of_sales');

            // Previous Year
            $table->year('previous_financial_year')->nullable()->after('current_gross_profit_loss');
            $table->decimal('previous_assets', 15, 2)->nullable()->after('previous_financial_year');
            $table->decimal('previous_non_current_assets', 15, 2)->nullable()->after('previous_assets');
            $table->decimal('previous_total_assets', 15, 2)->nullable()->after('previous_non_current_assets');
            $table->decimal('previous_current_liabilities', 15, 2)->nullable()->after('previous_total_assets');
            $table->decimal('previous_non_current_liabilities', 15, 2)->nullable()->after('previous_current_liabilities');
            $table->decimal('previous_total_liabilities', 15, 2)->nullable()->after('previous_non_current_liabilities');
            $table->decimal('previous_total_equity', 15, 2)->nullable()->after('previous_total_liabilities');
            $table->decimal('previous_retained_earnings', 15, 2)->nullable()->after('previous_total_equity');
            $table->decimal('previous_revenue', 15, 2)->nullable()->after('previous_retained_earnings');
            $table->decimal('previous_cost_of_sales', 15, 2)->nullable()->after('previous_revenue');
            $table->decimal('previous_gross_profit_loss', 15, 2)->nullable()->after('previous_cost_of_sales');
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
