<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Product extends Model
{
   use HasFactory, LogsActivity;

   public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('product')
            ->logOnly(['name', 'price', 'stock', 'description'])
            ->logOnlyDirty();
    }

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
