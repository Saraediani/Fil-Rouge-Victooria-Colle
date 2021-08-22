<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regiont extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'regiont';

    protected $fillable = [
        'name',
        'emploie_id',
    ];
}

