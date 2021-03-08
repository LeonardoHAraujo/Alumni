<?php

namespace Database\Factories;

use App\Models\Leads;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class LeadsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leads::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'company' => $this->faker->company,
            'linkedin' => $this->faker->url,
            'formation' => $this->faker->jobTitle,
            'contactPoint' => Arr::random(['Site', 'Email', 'Telefone', 'Indicação']),
            'dateFirstContact' => date('Y/m/d'),
            'cell' => $this->faker->unique()->phoneNumber,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->companyEmail,
            'emailSecondary' => $this->faker->email,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country
        ];
    }
}
