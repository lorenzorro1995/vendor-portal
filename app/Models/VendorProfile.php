<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', 'company_name', 'company_profile',
        'company_phone', 'company_email', 'company_fax',
        'company_registration_number', 'company_type',
        
        // Current Year Financials
        'current_financial_year',
        'current_assets',
        'current_non_current_assets',
        'current_total_assets',
        'current_current_liabilities',
        'current_non_current_liabilities',
        'current_total_liabilities',
        'current_total_equity',
        'current_retained_earnings',
        'current_revenue',
        'current_cost_of_sales',
        'current_gross_profit_loss',
        
        // Previous Year Financials
        'previous_financial_year',
        'previous_assets',
        'previous_non_current_assets',
        'previous_total_assets',
        'previous_current_liabilities',
        'previous_non_current_liabilities',
        'previous_total_liabilities',
        'previous_total_equity',
        'previous_retained_earnings',
        'previous_revenue',
        'previous_cost_of_sales',
        'previous_gross_profit_loss',
        
        // Address
        'address_1', 'address_2', 'address_3', 'city', 'state', 'zip_code', 'country'
    ];

    /**
     * Get the user that owns the vendor profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the director/shareholders for the vendor profile.
     */
    public function directorShareholders()
    {
        return $this->hasMany(DirectorShareholder::class);
    }
}