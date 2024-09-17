<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('club_user_affiliations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('club_id');
            $table->enum('status', ["Member","Honorary","Aspiring"]);
            $table->string('user_contact_email');
            $table->string('user_contact_phone')->nullable();
            $table->timestamp('joined_at');
            $table->timestamp('left_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_user_affiliations');
    }
};
