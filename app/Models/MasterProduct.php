<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'room',
        'location',
        'category',
        'facilities',
        'terms_conditions',
        'surrounding_places'
    ];

    public function images()
    {
        return $this->hasMany(MasterProductImage::class);
    }
}
