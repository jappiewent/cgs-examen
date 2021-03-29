<?php

namespace App\Models;

use App\Events\CustomerCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Customer extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => CustomerCreated::class,
    ];

    // RELATIONS
    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    public function truck()
    {
        return $this->morphMany(Truck::class, 'truckable');
    }

    // MEDIA
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('logo');
    }
}
