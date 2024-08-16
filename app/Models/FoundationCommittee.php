<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundationCommittee extends Model
{
    use HasFactory;

    protected $table="foundation_committees";

    protected $fillable =['creation_date','expiry_date',];
}
