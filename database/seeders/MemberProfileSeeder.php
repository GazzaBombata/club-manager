<?php

namespace Database\Seeders;

use App\Models\MemberProfile;
use Illuminate\Database\Seeder;

class MemberProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemberProfile::factory()->count(5)->create();
    }
}
