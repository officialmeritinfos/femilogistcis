<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryStage extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Define an inverse one-to-many relationship with Delivery.
     */
    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
}
