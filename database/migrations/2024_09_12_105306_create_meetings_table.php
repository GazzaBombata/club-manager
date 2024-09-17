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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->nullable();
            $table->foreignId('commission_id')->nullable();
            $table->dateTime('meeting_date');
            $table->dateTime('editable_until');
            $table->string('meeting_name');
            $table->text('meeting_description')->nullable();
            $table->string('location')->nullable();
            $table->enum('status', ["Draft","Published"]);
            $table->enum('booking_method', ["Internal","External"]);
            $table->text('booking_instructions')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
