<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable=[

            'user_id',


            'user_type',
            'name',
            'father_name',
            'dob',

            'mobile_own',
            
            'permanent_address_village',
            'permanent_address_post_office',
            'permanent_address_thana',
            'permanent_address_district',
            'permanent_address_division',
            'temporary_address',

            'marital_status',
            'mashgala_workplaces',
            'facebook_id',
            
            'faragat_year_hijri',
            'faragat_year_christian',
            'blood_group',
            
            'last_jamat_attended',
            'email',
            
            'mobile_guardian',
            'whatsapp',
            'tasnif',
            
            'social_organizational_contribution'
    ];
}
