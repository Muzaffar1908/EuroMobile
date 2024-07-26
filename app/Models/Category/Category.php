<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name_uz', 'name_ru', 'name_en', 'index', 'slug'];

    public function parents(): BelongsTo {
      return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany {
      return $this->hasMany(Category::class, 'parent_id');
    }

    public function sub_children(): HasMany {
      return $this->hasMany(Category::class);
    }
}
