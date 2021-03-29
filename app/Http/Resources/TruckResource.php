<?php

namespace App\Http\Resources;

use App\Models\Customer;
use App\Models\Shipment;
use Illuminate\Http\Resources\Json\JsonResource;

class TruckResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'license_plate' => $this->license_plate,
            'brand' => $this->brand,
            'customer' => $this->truckable_type === Customer::class ? CustomerResource::make($this->truckable) : null,
            'shipment' => $this->truckable_type === Shipment::class ? ShipmentResource::make($this->truckable) : null,
        ];
    }
}
