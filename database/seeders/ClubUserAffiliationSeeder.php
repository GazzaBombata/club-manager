<?php

namespace Database\Seeders;

use App\Models\ClubUserAffiliation;
use Illuminate\Database\Seeder;

class ClubUserAffiliationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClubUserAffiliation::factory()->count(5)->create();
    }
}
