<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Jobs\ScheduleVaccination;
use App\Models\VaccinationCenter;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Models\VaccinationRegistration;
use App\Http\Resources\VaccinationCenterResource;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register', ['centers' => VaccinationCenter::all()]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRequest $request): RedirectResponse
    {
        // dd($request->nid);
        $user = User::create([
            'name' => $request->name,
            'nid' => $request->nid,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        Auth::login($user);

        $vaccineCenter = VaccinationCenter::find($request->vaccine_center);

        if (!$vaccineCenter) {
            return response()->json(['error' => 'Invalid vaccination center'], 400);
        }

        Log::channel('single')->info('Check');

        if($request->auto_schedule) {
            ScheduleVaccination::dispatch($user, $vaccineCenter);
        } else {
            VaccinationRegistration::create([
                'user_id' => $user->id,
                'vaccine_center_id' => $vaccineCenter->id,
            ]);
        }

        return redirect(route('dashboard', absolute: false));
    }
}