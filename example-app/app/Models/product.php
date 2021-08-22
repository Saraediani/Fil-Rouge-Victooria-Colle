<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'product';

    protected $fillable = [
        'name',
        'qte',
        'price',
        'admin_id',
        'category_id',
        'description',
        'image'
    ];

    /**
     * Get the category associated with the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(category::class, 'category_id', 'id');
    }
}
