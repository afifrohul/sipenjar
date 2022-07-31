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
            'no_regis' => '12332',
            'enter_date' => '2019-12-12',
            'room' => 'B-12',
            'case' => 'Lorem Ipsum',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $prisoner = Prisoner::create([
            'name' => 'Beni',
            'no_regis' => '12333',
            'enter_date' => '2019-12-12',
            'room' => 'B-13',
            'case' => 'Lorem Ipsum',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $prisoner = Prisoner::create([
            'name' => 'Bena',
            'no_regis' => '12331',
            'enter_date' => '2019-12-12',
            'room' => 'B-14',
            'case' => 'Lorem Ipsum',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
