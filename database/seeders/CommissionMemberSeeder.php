<?php

namespace Database\Seeders;

use App\Models\CommissionMember;
use Illuminate\Database\Seeder;

class CommissionMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CommissionMember::factory()->count(5)->create();
    }
}
