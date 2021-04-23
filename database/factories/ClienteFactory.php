<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nombres" => $this->faker->name,
            "apellidos" => $this->faker->name,
            "direccion" => $this->faker->jobTitle,
            "telefono" => $this->faker->phoneNumber             ,
            "email" =>  $this->faker->email
        ];
    }
}
