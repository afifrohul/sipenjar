<?php

namespace Database\Seeders;

use App\Models\Send;
use Illuminate\Database\Seeder;

class SendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $send = Send::create([
            'id_user' => 2,
            'id_prisoner' => 1,
            'date' => '2022-07-21',
            'session' => 1,
            'type' => 'pakaian',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia veritatis hic, soluta velit consequuntur expedita vel, temporibus rerum beatae voluptatibus itaque dolorem, laudantium placeat cum! Consequuntur sed dolore aspernatur quae?',
            'status' => 'disetujui',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $send = Send::create([
            'id_user' => 2,
            'id_prisoner' => 2,
            'date' => '2022-07-21',
            'session' => 1,
            'type' => 'pakaian',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia veritatis hic, soluta velit consequuntur expedita vel, temporibus rerum beatae voluptatibus itaque dolorem, laudantium placeat cum! Consequuntur sed dolore aspernatur quae?',
            'status' => 'dalam antrian',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $send = Send::create([
            'id_user' => 2,
            'id_prisoner' => 2,
            'date' => '2022-07-21',
            'session' => 1,
            'type' => 'pakaian',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia veritatis hic, soluta velit consequuntur expedita vel, temporibus rerum beatae voluptatibus itaque dolorem, laudantium placeat cum! Consequuntur sed dolore aspernatur quae?',
            'status' => 'ditolak',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
