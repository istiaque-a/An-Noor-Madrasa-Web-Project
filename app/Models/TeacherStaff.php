<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherStaff extends Model
{
    use HasFactory;
    
    protected $table="teacher_staff";
    protected $fillable=[
            'user_id',
            'user_type',
            'name',
            'father_name',
            'rank',
            'permanent_address',
            'temporary_address',
            'khidmat_year',
            'ex_or_current',
            'current_working_institution',
            'whatsapp',
            'email',
    ];
}
