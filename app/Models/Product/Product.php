<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use App\Models\Shops\MainShops;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['main_shop_id', 'category_id', 'name', 'image', 'valyuta', 'price', 'count', 'is_deleted'];

    public function main_shops() {
        return $this->belongsTo(MainShops::class, 'main_shop_id');
    }

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
