<?php

namespace Database\Factories;

use App\Http\Controllers\ClientController;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $client = new ClientController;
        return [
            'client_code'                       =>  $client->newCodeClient(),
            'client_category_id'                =>  $this->faker->numberBetween($min = 1, $max = 4),
            'client_status_id'                  =>  $this->faker->numberBetween($min = 1, $max = 3),
            'client_name'                       =>  $this->faker->name,
            'client_telephone'                  =>  $this->faker->e164PhoneNumber,
            'client_city_id'                    =>  $this->faker->randomElement([21,23]),
            'created_at'                        =>  now(),
            'updated_at'                        =>  now()
        ];
    }
}
