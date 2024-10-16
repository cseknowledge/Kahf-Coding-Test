<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VaccinationCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VaccinationCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vaccineCenters = [
            [
                'name' => 'Pabna Medical College Hospital',
                'address' => 'Pabna Medical College Campus, Pabna',
                'phone' => '+880-73-65111',
                'email' => 'info@pmc.gov.bd',
                'site_url' => 'https://www.pmc.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Dhaka Medical College Hospital',
                'address' => 'Bakshibazar, Dhaka-1000',
                'phone' => '+880-2-55165060',
                'email' => 'info@dmch.gov.bd',
                'site_url' => 'https://www.dmch.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Chittagong Medical College Hospital',
                'address' => 'Chittagong Medical College Campus, Chittagong',
                'phone' => '+880-31-620333',
                'email' => 'info@cmc.gov.bd',
                'site_url' => 'https://www.cmc.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Rajshahi Medical College Hospital',
                'address' => 'Rajshahi Medical College Campus, Rajshahi',
                'phone' => '+880-721-772503',
                'email' => 'info@rmc.gov.bd',
                'site_url' => 'https://www.rmc.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Rangpur Medical College Hospital',
                'address' => 'Rangpur Medical College Campus, Rangpur',
                'phone' => '+880-521-63444',
                'email' => 'info@rmc.gov.bd',
                'site_url' => 'https://www.rmc.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Sylhet MAG Osmani Medical College Hospital',
                'address' => 'Sylhet MAG Osmani Medical College Campus, Sylhet',
                'phone' => '+880-821-716123',
                'email' => 'info@smoc.gov.bd',
                'site_url' => 'https://www.smoc.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Khulna Medical College Hospital',
                'address' => 'Khulna Medical College Campus, Khulna',
                'phone' => '+880-41-760500',
                'email' => 'info@kmc.gov.bd',
                'site_url' => 'https://www.kmc.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Barisal Sher-e-Bangla Medical College Hospital',
                'address' => 'Barisal Sher-e-Bangla Medical College Campus, Barisal',
                'phone' => '+880-43-651122',
                'email' => 'info@bsmch.gov.bd',
                'site_url' => 'https://www.bsmch.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Bangladesh Institute of Tropical and Infectious Diseases (BITID)',
                'address' => 'Chittagong Medical College Campus, Chittagong',
                'phone' => '+880-31-620333',
                'email' => 'info@bitid.gov.bd',
                'site_url' => 'https://www.bitid.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Comilla Medical College Hospital',
                'address' => 'Comilla Medical College Campus, Comilla',
                'phone' => '+880-81-76111',
                'email' => 'info@cmc.gov.bd',
                'site_url' => 'https://www.cmc.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Noakhali Medical College Hospital',
                'address' => 'Noakhali Medical College Campus, Noakhali',
                'phone' => '+880-321-62022',
                'email' => 'info@nmch.gov.bd',
                'site_url' => 'https://www.nmch.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Mymensingh Medical College Hospital',
                'address' => 'Mymensingh Medical College Campus, Mymensingh',
                'phone' => '+880-91-66063',
                'email' => 'info@mmc.gov.bd',
                'site_url' => 'https://www.mmc.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Faridpur Medical College Hospital',
                'address' => 'Faridpur Medical College Campus, Faridpur',
                'phone' => '+880-63-62522',
                'email' => 'info@fmc.gov.bd',
                'site_url' => 'https://www.fmc.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Jessore Medical College Hospital',
                'address' => 'Jessore Medical College Campus, Jessore',
                'phone' => '+880-42-68333',
                'email' => 'info@jmc.gov.bd',
                'site_url' => 'https://www.jmc.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
            [
                'name' => 'Kushtia Medical College Hospital',
                'address' => 'Kushtia Medical College Campus, Kushtia',
                'phone' => '+880-71-62022',
                'email' => 'info@kmc.gov.bd',
                'site_url' => 'https://www.kmc.gov.bd',
                'daily_capacity' => rand(30, 100),
            ],
        ];

        foreach ($vaccineCenters as $vaccineCenter) {
            VaccinationCenter::create($vaccineCenter);
        }
    }
}