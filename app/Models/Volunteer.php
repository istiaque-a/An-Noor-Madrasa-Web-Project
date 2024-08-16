<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable=[

            'user_id',
            'user_type',
            
            'name',
            'father_name',

            'temporary_address',
            'profession',
            'current_working_institution',

                
            'mobile_own',
            'email',
            'whatsapp',
            
            'age',
            'educational_institution',
            'current_working_institution',
            
            'skill_experience'

    ];
}
