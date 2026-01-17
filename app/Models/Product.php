<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'desc',
        'qun',
        'price',
        'image',
        'cat_id',
        'user_id',
        'status'

    ];
  

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }
     public function user()
    {
        return $this->belongsTo(Cat::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

}
