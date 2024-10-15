<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Jobs\SendVaccinationReminderJob;

class SendVaccinationReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:vaccination-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send vaccination reminder emails the every night 21:00 PM before the scheduled date.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::channel('single')->info("Job vaccination-reminder ".Carbon::tomorrow()->format('Y-m-d'));
        $users = User::whereHas('registration', function ($query) {
            $query->whereDate('vaccination_date', Carbon::tomorrow()->format('Y-m-d'))
                  ->where('status', 'scheduled');
        })->get();
        foreach ($users as $user) {
            Log::channel('single')->info($users->count());
            SendVaccinationReminderJob::dispatch($user);
        }
    }
}