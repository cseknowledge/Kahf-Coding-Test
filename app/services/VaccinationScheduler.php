<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\User;
use App\Models\VaccinationCenter;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use App\Models\VaccinationRegistration;

class VaccinationScheduler
{
    public function schedule(User $user, VaccinationCenter $center)
    {
        $today = Carbon::now();
        $possibleDate = $today->copy();
        Log::channel('single')->info("Service");

        while (true) {
            if (in_array($possibleDate->dayOfWeek, [Carbon::FRIDAY, Carbon::SATURDAY])) {
                $possibleDate->addDay();
                continue;
            }

            if ($this->isBangladeshiHoliday($possibleDate)) {
                $possibleDate->addDay();
                continue;
            }

            $scheduledCount = VaccinationRegistration::where('vaccine_center_id', $center->id)
                ->whereDate('vaccination_date', $possibleDate)
                ->count();

            if ($scheduledCount < $center->daily_capacity) {
                return $possibleDate;
            }

            $possibleDate->addDay();
        }
    }

    private function isBangladeshiHoliday($date)
    {
        $holidays = config('holidays');
        $formattedDate = Carbon::parse($date)->format('m-d');
        return in_array($formattedDate, $holidays);
    }
}
