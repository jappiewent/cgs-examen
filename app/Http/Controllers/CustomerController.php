<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * @param CreateCustomerRequest $request
     * @return CustomerResource $customer
     */
    public function store(CreateCustomerRequest $request): CustomerResource
    {
        $customer = Customer::query()->create($request->except('logo'));
        $customer->addMediaFromRequest('logo')->toMediaCollection('logo');
        return CustomerResource::make($customer);
    }
}
