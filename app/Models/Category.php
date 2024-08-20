<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'created_by',
        'tag_id',
        'description',
        'meta_title',
        'meta_tag',
        'meta_description',
        'files',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'files' => 'array',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
