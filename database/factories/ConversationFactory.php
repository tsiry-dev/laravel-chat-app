<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conversation>
 */
class ConversationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id1' => $this->faker->randomElement(User::all()->pluck('id')->toArray()),
            'user_id2' => $this->faker->randomElement(User::all()->pluck('id')->toArray()),
            'last_message_id' => null,
            'created_at' => new Carbon(),
            'updated_at' => new Carbon(),
        ];
    }
}
