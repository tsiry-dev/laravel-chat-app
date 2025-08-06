<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 1. Récupérer tous les IDs des utilisateurs
        $userIds = User::all()->pluck('id')->toArray();

        // 2. Choisir quelqu'un qui envoie le message
        $senderId = $this->faker->randomElement($userIds);

        // 3. Décider si c'est un message privé ou de groupe (50/50)
        $estMessagePrive = $this->faker->boolean();

        if ($estMessagePrive) {
            // MESSAGE PRIVÉ : receiver oui, group non
            $autresUtilisateurs = array_diff($userIds, [$senderId]);
            $receiverId = $this->faker->randomElement($autresUtilisateurs);
            $groupId = null;
        } else {
            // MESSAGE DE GROUPE : group oui, receiver non
            $receiverId = null;
            $groupId = $this->faker->randomElement(Group::all()->pluck('id')->toArray());
        }

        return [
            'message' => $this->faker->sentence,
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'group_id' => $groupId,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
