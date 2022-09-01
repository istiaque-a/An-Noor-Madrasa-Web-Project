<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    use HasFactory;

    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'docs';


    /**
     * 
     * created_at and updated_at fields will be used
     * 
     * @var string
     * 
     */

    public $timestamps = true;




    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'created_at',
        'updated_at'
    ];

}
