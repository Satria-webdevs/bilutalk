<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['image', 'title', 'category_id', 'description', 'price', 'stock'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
