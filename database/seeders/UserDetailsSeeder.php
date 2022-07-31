<?php

namespace Database\Seeders;

use App\Models\UserDetails;
use Illuminate\Database\Seeder;

class UserDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detail = UserDetails::create([
            'user_id' => 3,
            'nik' => '3509202009990001',
            'no_hp' => '083272232181',
            'address' => 'Jl Nanas, Patrang, Jember',
            'ktp_photo' => 'default.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
