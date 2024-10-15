<?php

use App\Models\User;
use App\Models\VaccinationCenter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vaccination_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id');
            $table->foreignIdFor(VaccinationCenter::class, 'vaccine_center_id');
            $table->date('vaccination_date')->nullable();
            $table->enum('status', ['not_scheduled', 'scheduled', 'vaccinated'])->default('not_scheduled');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccination_registrations');
    }
};