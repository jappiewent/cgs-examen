<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShipmentRequest;
use App\Http\Resources\ShipmentResource;
use App\Models\Shipment;

class ShipmentController extends Controller
{
    /**
     * @param CreateShipmentRequest $request
     * @return ShipmentResource $customer
     */
    public function store(CreateShipmentRequest $request): ShipmentResource
    {
        $customer = Shipment::query()->create($request->validated());
        return ShipmentResource::make($customer);
    }
}
