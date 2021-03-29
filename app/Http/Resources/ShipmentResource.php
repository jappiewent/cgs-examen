<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentResource extends JsonResource
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
            'reference' => $this->reference,
            'address' => $this->address,
            'city' => $this->city,
            'customer' => CustomerResource::make($this->customer),
        ];
    }
}
