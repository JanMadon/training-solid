<?php

namespace Tests\Factories;

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;

trait CreateInstructor
{
    use WithFaker;
    private function createInstructor(): Instructor
    {
        $user = User::create([
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'password' => bcrypt('secret'),
            'is_active' => true,
        ]);

        return Instructor::create([
            'user_id' => $user->getKey(),
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'instructor_slug' => $this->faker->slug(),
            'contact_email' => $user->email,
            'telephone' => $this->faker->phoneNumber(),
            'mobile' => $this->faker->phoneNumber(),
            'paypal_id' => $this->faker->numberBetween(1 , 1000),
            'biography' => $this->faker->paragraph(),
            'instructor_image' => $this->faker->imageUrl(),
        ]);
    }
}