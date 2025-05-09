<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $table = 'deliveries';
    protected $guarded=[];

    /**
     * Define a one-to-many relationship with DeliveryStage.
     */
    public function stages()
    {
        return $this->hasMany(DeliveryStage::class);
    }
}
