<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $guarded = [];

    // RELATIONS
    public function trucks()
    {
        return $this->morphMany(Truck::class, 'truckable');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
