<?php

namespace App\Models\Shops;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MainShops extends Model
{
    use HasFactory;

    protected $tabel = 'main_shops';
    protected $fillable = ['name', 'image'];

    public function shops(): HasOne {
      return $this->hasOne(Shops::class, 'id');
    }
}
