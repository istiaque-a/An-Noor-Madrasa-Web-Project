<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FujalaHighCommitteeDetail extends Model
{
    use HasFactory;

    protected $table="fujala_high_committee_details";

    

    protected $fillable =['id','fujala_high_committee_id',    'member_name',     'position',    'address',     
    'educational_qualification',   'mobile',  'photo'];
}
