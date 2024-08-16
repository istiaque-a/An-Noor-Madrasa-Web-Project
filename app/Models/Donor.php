<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable=[

        'user_id',
        'user_type',
        'name',
        'profession',
        'current_working_institution',

        
        'mobile_own',
        
        

        'rank',
        'temporary_address',
        'donor_type',
        'donation_type',
        'donation_fields',
        'donation_amount'
    ];
}
