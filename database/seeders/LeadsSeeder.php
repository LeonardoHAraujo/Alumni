<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Leads;

class LeadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Leads::factory()->count(100)->create();
    }
}
