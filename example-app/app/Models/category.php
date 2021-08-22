<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'category';

    protected $fillable = [
        
        'name',
        'state',
        'image'
    ];
    /**
     * Get all of the product for the category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasMany(product::class, 'category_id', 'id');
    }
}
