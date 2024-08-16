<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajlisheShura extends Model
{
    use HasFactory;
    // protected $table = 'majlishe_shuras';
    protected $fillable =['creation_date','expiry_date',];
}
