<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class VaccinationRegistration extends Model
{
    use SoftDeletes, HasFactory, Searchable;

    protected $touches = ['user'];

    protected $fillable = [
        'user_id',
        'vaccine_center_id',
        'vaccination_date',
        'status',
    ];

    protected function casts()
    {
        return [
            'vaccination_date' => 'date',
        ];
    }

    public function getFormattedStatusAttribute()
    {
        return ucwords(str_replace('_', ' ', $this->status));
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function vaccineCenter(): BelongsTo
    {
        return $this->belongsTo(VaccinationCenter::class);
    }
}