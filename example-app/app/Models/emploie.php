<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emploie extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'emploie';

    protected $fillable = [
        
    'name',
	'email',
   	'password',	
    'phone',
    ];

}
