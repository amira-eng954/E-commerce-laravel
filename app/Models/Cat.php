<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'namecat',
        'body',
        'order'
        
    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
