<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundationActivity extends Model
{
    use HasFactory;

    protected $table="foundation_activities";

    

    protected $fillable =['id','activity_heading','activity_body','activity_type','activity_cat','url','publish_date' ];

}
