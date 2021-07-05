<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Task;
use App\Models\TaskHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaskHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'task_id' => Task::pluck('id')->random(),
               'old_status' => $this->faker->randomElement([
                "in progress",
                "not started",
                "done",
            ]),
            'new_status' => $this->faker->randomElement([
                "in progress",
                "not started",
                "done",
            ]),
            'created_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
        
        ];
    }
}
