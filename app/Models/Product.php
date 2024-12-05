<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'qun',
        'price',
        'image',
        'cat_id',
        'user_id'

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }

}
