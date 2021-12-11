<?php

namespace Database\Factories;


//use Faker\Provider\Lorem;
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
      //  $this->faker->addProvider(new Lorem($this->faker));
        return [
            'code' => $this->faker->bothify('?????##'),
            'author' =>$this->faker->name(),
            'title' => $this->faker->words(3, true)
        ];
    }
}
