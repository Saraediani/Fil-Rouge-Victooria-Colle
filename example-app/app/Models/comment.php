<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'comment';

    protected $fillable = [
        
	'name',
    'email',	
    'message',	
    'user_id',	
    'product_id'	
    ];
}
