<?php

namespace App\Console\Commands;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Console\Command;
use App\Jobs\ScheduleVaccination;
use App\Models\VaccinationCenter;
use Illuminate\Support\Facades\Log;

class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:users {--number=10} {--schedule=true}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a specified number of users using Faker with optional schedule and vaccinated flags';

    protected $help = <<<HELP
This command allows you to create a specified number of users in the system.

Options:
    --number         Number of users to create (default: 10)
    --schedule       Boolean flag to set if users should be scheduled (default: true)

Examples:
    Create 10 users with default settings:
        php artisan create:users

    Create 20 users, setting schedule to true:
        php artisan create:users --number=20 --schedule=true
HELP;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $number = $this->option('number');
        $schedule = filter_var($this->option('schedule'), FILTER_VALIDATE_BOOLEAN);

        // echo "schedule- ".$schedule; die;

        $faker = Faker::create();

        for ($i = 0; $i < $number; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'nid' => $this->generateUniqueNID(),
                'email' => $faker->unique()->safeEmail,
                'phone' => $this->generateBangladeshPhoneNumber(),
                'password' => bcrypt('password'),
            ]);

            $vaccineCenter = VaccinationCenter::find($this->getRandomVaccinationCenterId());

            if (!$vaccineCenter) {
                return response()->json(['error' => 'Invalid vaccination center'], 400);
            }

            Log::channel('single')->info('Check Command');

            if($schedule) {
                ScheduleVaccination::dispatch($user, $vaccineCenter);
            }
        }

        $this->info("Successfully created {$number} users.");
    }

    private function generateUniqueNID()
    {
        do {
                $nid = mt_rand(10000000000000000, 99999999999999999);
        } while (User::where('nid', $nid)->exists());

        return $nid;
    }

    private function generateBangladeshPhoneNumber() {
        $operatorCodes = ['13', '15', '16', '17', '18', '19'];
        $operatorCode = $operatorCodes[array_rand($operatorCodes)];
        $lastEightDigits = mt_rand(10000000, 99999999);
        $phoneNumber = '0' . $operatorCode . $lastEightDigits;
        return $phoneNumber;
    }

    private function getRandomVaccinationCenterId()
    {
        $vaccinationCenterIds = VaccinationCenter::pluck('id')->toArray();

        if (!empty($vaccinationCenterIds)) {
            $randomVaccinationCenterId = $vaccinationCenterIds[array_rand($vaccinationCenterIds)];
            return $randomVaccinationCenterId;
        }

        return null;
    }
}