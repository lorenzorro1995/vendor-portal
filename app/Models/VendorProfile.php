<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VendorProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'company_name', 'company_profile',
        'company_phone', 'company_email', 'company_fax',
        'company_registration_number', 'company_type',
        'address_1', 'address_2', 'address_3', 'city', 'state', 'zip_code', 'country'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function directorShareholders()
    {
        return $this->hasMany(DirectorShareholder::class);
    }
}
