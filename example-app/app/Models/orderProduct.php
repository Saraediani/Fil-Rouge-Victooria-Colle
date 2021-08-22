<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'orderproduct';

    protected $fillable = [

   	'product_id',	
    'order_id'
    ];
}
