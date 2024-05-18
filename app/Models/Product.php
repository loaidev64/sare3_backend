<?php

namespace App\Models;

use App\Traits\Traits\Models\HiddenTimestamps;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use HiddenTimestamps;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'regular_price',
        'sale_price',
        'brand_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'regular_price' => 'double',
        'sale_price' => 'double',
        'brand_id' => 'integer',
    ];

    protected function onSale(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->sale_price != null,
        );
    }

    protected function discountPercentage(): Attribute
    {
        return Attribute::make(
            get: fn () => ($this->regular_price  - $this->sale_price) / 100,
        );
    }
}
