<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Client;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OportunityFactory extends Factory
{
    public function definition()
    {
        $status = ['open', 'accept', 'lost'];

        return [
            'client_id'      => Client::all()->random(1)->first()->id,
            'user_id'        => User::all()->random(1)->first()->id,
            'product_id'     => Product::all()->random(1)->first()->id,
            'status'         => $status[array_rand($status)],
            'created_at'     => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
