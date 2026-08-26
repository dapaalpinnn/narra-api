<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Dummy password used for testing purposes. Use this
     * password to login to the application in local development.
     */
    public const string DUMMY_PASSWORD = 'super-secret';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make(self::DUMMY_PASSWORD),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Append user name with role name that will be used and removed on configure().
     */
    public function role(string $roleName): static
    {
        $role = Role::findOrCreate($roleName);

        return $this->afterCreating(fn (User $user) => $user->assignRole($role));
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
