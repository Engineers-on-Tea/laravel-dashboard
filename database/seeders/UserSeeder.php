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
    public function run()
    {
        User::query()
            ->create([
                'name' => 'Admin',
                'email' => 'admin@system.com',
                'password' => bcrypt('123456'),
                'email_verified_at' => now(),
                'guard_name' => 'web',
            ]);
    }
}
