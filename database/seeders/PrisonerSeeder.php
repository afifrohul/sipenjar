<?php

namespace Database\Seeders;

use App\Models\Prisoner;
use Illuminate\Database\Seeder;


class PrisonerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prisoner = Prisoner::create([
            'name' => 'Beno',
            'nik' => '350920202308090002',
            'birth_date' => '1990-12-12',
            'country' => 'Jember',
            'photo' => 'default.png',
            'room' => 'B-12',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $prisoner = Prisoner::create([
            'name' => 'Beni',
            'nik' => '350920202308090003',
            'birth_date' => '1990-12-12',
            'country' => 'Jember',
            'photo' => 'default.png',
            'room' => 'B-12',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $prisoner = Prisoner::create([
            'name' => 'Bena',
            'nik' => '350920202308090001',
            'birth_date' => '1990-12-12',
            'country' => 'Jember',
            'photo' => 'default.png',
            'room' => 'B-12',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
