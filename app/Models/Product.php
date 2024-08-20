<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'brand',
        'weight',
        'gender',
        'sizes',
        'colors',
        'description',
        'tag_number',
        'stock',
        'tag',
        'price',
        'discount',
        'tax',
        'images',
    ];

    protected $casts = [
        'sizes' => 'array',
        'colors' => 'array',
        'tag' => 'array',
        'images' => 'array',
        'price' => 'decimal:2',
        'discount' => 'decimal:2',
        'tax' => 'decimal:2',
        'weight' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes()
{
    return $this->belongsToMany(Size::class);
}
public function colors()
{
    return $this->belongsToMany(Color::class, 'color_name');
}
}
