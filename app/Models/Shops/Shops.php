<?php

namespace App\Models\Shops;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shops extends Model
{
    use HasFactory;

    protected $tabel = 'shops';
    protected $fillable = ['main_shop_id', 'name'];

    public function main_shops(): BelongsTo {
      return $this->belongsTo(MainShops::class, 'main_shop_id');
    }
}
