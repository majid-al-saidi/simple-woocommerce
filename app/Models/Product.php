<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
