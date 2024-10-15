<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Console\Command;
use App\Jobs\ScheduleVaccination;
use Illuminate\Support\Facades\Log;
use App\Models\VaccinationRegistration;

class ScheduleUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vaccination schedule update';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $registeredUsers = VaccinationRegistration::where('status', 'not_scheduled')->with(['user', 'vaccineCenter'])
        ->get();

        foreach ($registeredUsers as $registeredUser) {
            ScheduleVaccination::dispatch($registeredUser->user, $registeredUser->vaccineCenter);
        }

        $this->info("Successfully updated vaccination schedule.");
    }
}