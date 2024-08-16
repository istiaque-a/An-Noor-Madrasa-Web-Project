<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FujalaHighCommittee extends Model
{
    use HasFactory;

    protected $table="fujala_high_committees";

    protected $fillable =['creation_date','expiry_date',];
}
