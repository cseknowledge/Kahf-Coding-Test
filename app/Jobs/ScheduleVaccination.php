<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use App\Models\VaccinationCenter;
use Illuminate\Support\Facades\Log;
use App\Events\VaccinationRegistered;
use App\Services\VaccinationScheduler;
use Illuminate\Queue\SerializesModels;
use App\Models\VaccinationRegistration;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ScheduleVaccination implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $vaccineCenter;

    public function __construct(User $user, VaccinationCenter $vaccineCenter)
    {
        $this->user = $user;
        $this->vaccineCenter = $vaccineCenter;
    }

    public function handle(VaccinationScheduler $scheduler)
    {
        Log::channel('single')->info("Job");
        $vaccinationDate = $scheduler->schedule($this->user, $this->vaccineCenter);

        $registration = VaccinationRegistration::updateOrCreate(
            ['user_id' => $this->user->id],
            [
                'vaccine_center_id' => $this->vaccineCenter->id,
                'vaccination_date' => $vaccinationDate,
                'status' => 'scheduled',
            ]
        );


        event(new VaccinationRegistered($registration));
    }
}