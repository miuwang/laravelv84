<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->bothify('?????##'),
            'author' =>$this->faker->name(),
            'title' => $this->faker->name(),//$this->faker->words(3),

        ];
    }
}
