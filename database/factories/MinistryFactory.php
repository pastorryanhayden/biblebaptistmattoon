<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ministry>
 */
class MinistryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Ministry::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'for' => 'Everyone',
            'leader_id' => 1,
            'body' => $this->faker->text,
            'meeting_info' => $this->faker->text,
            'homepage' => $this->faker->boolean,
            'image' => $this->faker->image('public/storage', 640, 480, null, false),
        ];
    }
}
