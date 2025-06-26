<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DirectorShareholder extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_profile_id', 'fullname', 'status', 'nric_passport',
        'designation', 'email', 'locality', 'ordinary_shares', 'preference_shares'
    ];
}
