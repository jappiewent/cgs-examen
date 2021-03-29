<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:customer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A command to create a customer';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('What is the name of the Customer?');
        $email = $this->ask('What is the email of the customer?');
        $logoUrl = $this->ask('Please provide a logo (url)');

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'logoUrl' => $logoUrl,
        ], [
            'name' => ['required', 'string', 'unique:customers,name'],
            'email' => ['required', 'email', 'unique:customers,email'],
            'logoUrl' => ['required', 'url'],
        ]);

        if ($validator->fails()) {
            $this->info('User NOT created. See error messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        } else {
            $data = $validator->validated();
            $customer = Customer::query()
                ->create([
                    'name' => $data['name'],
                    'email' => $data['email']
                ]);
            $customer->addMediaFromUrl($data['logoUrl'])->toMediaCollection('logo');
        }

        $this->info('Customer created successful!');
        return 1;
    }
}
