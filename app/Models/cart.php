<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    /**
     * Get the product associated with the cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
}
