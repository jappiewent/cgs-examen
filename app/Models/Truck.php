<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relations
    public function truckable()
    {
        return $this->morphTo();
    }

    // Helpers
    public function getTruck($value)
    {
        return $this->brand . ' ' . $this->license_plate;
    }
}
