<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_type',
        'email',
        
        'mobile',
        'mobile_guardian',
        'father_name',
        'rank',
        'age',
        'educational_institution',
        'skill_experience',
        'dob',
        'profession',
        'current_working_institution',
        'donation_type',
        'donation_amount',
        'donation_fields',
        
        'permanent_address',
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
        'current_class',
        'last_jamat_attended',
        'tasnif',
        'social_organizational_contribution',


        'whatsapp',
        'khidmat_year',
        'ex_or_current',
        'current_working_institution',  
        'student_type',
        'approved',
        'password' ,

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
