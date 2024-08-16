<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundationCommitteeDetail extends Model
{
    use HasFactory;

    protected $table="foundation_committee_details";

    

    protected $fillable =['id','foundation_committee_id',    'member_name',     'position',    'address',     
    'educational_qualification',   'mobile',  'photo'];

    
}
