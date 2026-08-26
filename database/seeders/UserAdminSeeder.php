<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->role(Role::SUPERADMIN->value)->create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
        ]);
    }
}
