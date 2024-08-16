<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajlisheShuraDetail extends Model
{
    use HasFactory;

    protected $table="majlishe_shura_details";

    protected $fillable =['id','majlishe_sura_id',    'member_name',     'position',    'address',     
    'educational_qualification',   'mobile',  'photo'];
}
