<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTruckRequest;
use App\Http\Resources\TruckResource;
use App\Models\Truck;

class TruckController extends Controller
{
    /**
     * @param CreateTruckRequest $request
     * @return TruckResource $customer
     */
    public function store(CreateTruckRequest $request): TruckResource
    {
        $customer = Truck::query()->create($request->validated());
        return TruckResource::make($customer);
    }
}
