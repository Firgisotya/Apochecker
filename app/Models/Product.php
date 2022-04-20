<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function stoks()
    {
        return $this->hasMany(Stok::class);
    }
}
