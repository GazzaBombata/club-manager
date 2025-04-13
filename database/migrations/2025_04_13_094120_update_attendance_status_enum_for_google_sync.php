<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->string('status', 50)->change();
        });
    }

    public function down(): void
    {
        // Se vuoi tornare indietro a ENUM (opzionale)
        DB::statement("ALTER TABLE attendances MODIFY status ENUM('Invited','Present','Absent','Excused') NOT NULL");
    }
};

