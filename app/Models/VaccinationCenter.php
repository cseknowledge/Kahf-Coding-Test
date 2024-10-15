<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class VaccinationCenter extends Model
{
    use SoftDeletes, HasFactory, Searchable;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'site_url',
        'daily_capacity',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(VaccinationRegistration::class);
    }
}
