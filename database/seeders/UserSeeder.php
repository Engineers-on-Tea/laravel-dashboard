<?php

namespace Database\Seeders;

use App\Modules\Home\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::query()
            ->create([
                'id' => 1,
                'name' => 'root',
                'email' => 'admin@email.com',
                'password' => bcrypt('123456'),
                'email_verified_at' => now(),
                'guard_name' => 'web',
                'active' => true,
            ]);
    }
}
