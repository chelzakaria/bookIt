<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model =Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> 5,
            'title' => $this->faker->word(),
            'author' => $this->faker->word(),
            'num_page' => $this->faker->numberBetween(10, 500),
            'description' => $this->faker->sentence(20),
            'rating' => $this->faker->numberBetween(0, 5),
            'cover' => "noimage.jpg",
            'read' => $this->faker->numberBetween(0, 1)
             
        ];
    }
}
