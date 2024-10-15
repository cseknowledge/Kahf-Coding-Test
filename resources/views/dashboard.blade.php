@php
    $status = Auth::user()->registration->formatted_status;
    if((\Carbon\Carbon::parse(Auth::user()->registration->vaccination_date)->lte(\Carbon\Carbon::today())) || Auth::user()->registration->status == 'vaccinated') {
        $color = 'darkgreen';
        $status = 'Vaccinated';
    } else if(Auth::user()->registration->status == 'scheduled') {
        $color = 'goldenrod';
    } else {
        $color = 'darkred';
    }
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <h5 style="font-weight: bold;color: white;background: {{ $color }};padding: 5px 12px;min-width: 150px;border: 1px solid #000;border-radius: 6px;float: right;margin-top: -36px;text-align: center;">{{ $status }}</h5>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
