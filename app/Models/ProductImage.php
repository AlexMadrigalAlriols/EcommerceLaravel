<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    use HasImage;

    public const IMAGE_FOLDER = 'product_images';

    protected $fillable = [
        'product_id',
        'image',
        'title'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected function imageFolder(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return new \Illuminate\Database\Eloquent\Casts\Attribute(
            get: fn ($value) => self::IMAGE_FOLDER . '/' . $this->product->id,
            set: fn ($value) => $value
        );
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
