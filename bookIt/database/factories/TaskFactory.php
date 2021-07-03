<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => Book::pluck('id')->random(),
            'user_id'=> 5,
             'task_name' => $this->faker->word(),
            'task_description' => $this->faker->sentence(5),
            'status' => $this->faker->randomElement([
                "in progress",
                "not started",
                "done",
            ]),
            'task_importance' => $this->faker->randomElement([
                "low",
                "medium",
                "high",
            ]),
            'notification' => $this->faker->randomElement([
                "off",
                "on",
            ]),
            'start_date' => $this->faker->dateTimeBetween('-30 days', '+30 days'),
            'end_date' => $this->faker->dateTimeBetween('-30 days', '+30 days'),
            'reminder_time' => $this->faker->randomElement([
                300,
                600,
                900,
                3600,
                7200,
                86400,
                172800
             ])
        ];
    }
}
