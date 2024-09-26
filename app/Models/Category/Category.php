<?php

namespace App\Models\Category;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['parent_id', 'name_uz', 'name_ru', 'name_en', 'index', 'slug'];

    public function parents(): BelongsTo {
      return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany {
      return $this->hasMany(Category::class, 'parent_id');
    }

    public function sub_children(): HasMany {
      return $this->hasMany(Category::class);
    }

    public function products() {
      return $this->hasMany(Product::class, 'id');
    }

    // Automatically generate slug from name_uz when creating/updating
    public static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            // Generate slug if not present
            if (!$category->slug) {
                $category->slug = \Illuminate\Support\Str::slug($category->name_uz, '-');
            }

            // Set parent_id to null if not provided
            if (is_null($category->parent_id)) {
                $category->parent_id = null;
            }
        });
    }
}
