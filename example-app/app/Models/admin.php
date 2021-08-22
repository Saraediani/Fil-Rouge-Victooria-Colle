<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'admin';

    protected $fillable = [
        
        'email',
        'password'

    ];

    protected $hidden = [
        'password'
    ];
}

