<?php

namespace Database\Factories;

use App\Http\Controllers\IntermediaireController;
use App\Models\Intermediaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class IntermediaireFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Intermediaire::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $intermediaire = new IntermediaireController;
        return [
            'intermediaire_code'                       =>  $intermediaire->newCodeIntermediaire(),
            'intermediaire_category_id'                =>  $this->faker->numberBetween($min = 1, $max = 4),
            'intermediaire_status_id'                  =>  $this->faker->numberBetween($min = 1, $max = 3),
            'intermediaire_name'                       =>  $this->faker->name,
            'intermediaire_telephone'                  =>  $this->faker->e164PhoneNumber,
            'intermediaire_city_id'                    =>  $this->faker->randomElement([21,23]),
            'created_at'                        =>  now(),
            'updated_at'                        =>  now()
        ];
    }
}
