<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => Book::pluck('id')->random(),
            'user_id'=> 25,
            'body' => $this->faker->sentence(50),
            'type' => $this->faker->randomElement([
                "Quote",
                "Uncategorized",
                "Thought",
                "Idea"
            ])
        ];
    }
}
