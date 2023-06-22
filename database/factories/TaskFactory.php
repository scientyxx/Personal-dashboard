<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'task_name' => $this->faker->sentence,
            // Isi dengan definisi kolom lain yang ada di tabel 'task'
        ];
    }
}

