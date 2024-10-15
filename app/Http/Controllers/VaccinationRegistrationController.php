<?php

namespace App\Http\Controllers;

use App\Models\VaccinationRegistration;
use App\Http\Requests\StoreVaccinationRegistrationRequest;
use App\Http\Requests\UpdateVaccinationRegistrationRequest;

class VaccinationRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVaccinationRegistrationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VaccinationRegistration $vaccinationRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VaccinationRegistration $vaccinationRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVaccinationRegistrationRequest $request, VaccinationRegistration $vaccinationRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VaccinationRegistration $vaccinationRegistration)
    {
        //
    }
}
