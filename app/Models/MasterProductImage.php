<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'master_product_id',
        'image_path',
    ];

    public function masterProduct()
    {
        return $this->belongsTo(MasterProduct::class);
    }
}
