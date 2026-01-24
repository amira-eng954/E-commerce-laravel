<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vertify extends Model
{
    use HasFactory;
      protected $fillable = [
        'uses',
        'type',
        'code',
        'expired_at',
        'user_id'

    ];
}

