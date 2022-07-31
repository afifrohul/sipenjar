<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Auth\Events\Registered;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name' => 'Master',
            'email' => 'themaster@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('superadmin123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($superadmin));
        $superadmin->assignRole('admin');

        $admin = User::create([
            'name' => 'Ben',
            'email' => 'admin01@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin01'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($admin));
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Hermawan',
            'email' => 'Hermawan11@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('hermawan123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($user));
        $user->assignRole('user');
    }
}
