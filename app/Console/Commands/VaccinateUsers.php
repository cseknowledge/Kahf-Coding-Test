<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\VaccinationRegistration;

class VaccinateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vaccinate:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vaccination status update';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        VaccinationRegistration::where('status', 'scheduled')
        ->whereDate('vaccination_date', '<=', Carbon::today())
        ->update(['status' => 'vaccinated']);

        $this->info("Successfully updated vaccination status.");
    }
}
