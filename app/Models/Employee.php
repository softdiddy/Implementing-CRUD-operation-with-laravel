<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'othernames',
        'email',
        'date_of_birth',
        'state_id',
        'lga_id',
        'phone_number',
        
    ];

    protected $table = 'employee';
}
