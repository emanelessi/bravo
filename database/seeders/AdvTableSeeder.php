<?php

namespace Database\Seeders;

use App\Models\Adv;
use Illuminate\Database\Seeder;

class AdvTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adv::factory()->times(5)->create();

    }
}
