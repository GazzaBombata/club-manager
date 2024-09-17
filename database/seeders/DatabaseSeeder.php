<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\ClubUserAffiliation;
use App\Models\Commission;
use App\Models\CommissionMember;
use App\Models\Meeting;
use App\Models\MeetingMinute;
use App\Models\MemberProfile;
use App\Models\Payment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ClubSeeder::class,
            ClubUserAffiliationSeeder::class,
            MemberProfileSeeder::class,
            CommissionSeeder::class,
            CommissionMemberSeeder::class,
            MeetingSeeder::class,
            MeetingMinuteSeeder::class,
            PaymentSeeder::class,
            AttendanceSeeder::class,
            // Aggiungi qui tutti i ModelSeeder che hai creato
        ]);
    }
}
