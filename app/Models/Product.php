<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'price', 'quantity', 'category_id'];

    /**
     * Get the category that the product belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
