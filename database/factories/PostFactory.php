<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = [
            "archived",
            "published",
            "draft"
        ];

        return [
            "user_id"   => User::factory(),
            "title"     => Fake()->text(30),
            "status"    => $status[mt_rand(0, 2)],
        ];
    }

    // state function could also take parameters
    public function status($w)
    {
        return $this->state(function (Array $attributes) use($w) {
            return [
                "status" => $w
            ];
        });
    }

    public function published()
    {
        return $this->state(function (Array $attributes) {
            return [
                "status" => "published",
            ];
        });
    }

    public function draft()
    {
        return $this->state(function (Array $attributes) {
            return [
                "status" => "draft",
            ];
        });
    }
}
