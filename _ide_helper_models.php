<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $nid
 * @property string $email
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\VaccinationRegistration|null $registration
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $site_url
 * @property int $daily_capacity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VaccinationRegistration> $registrations
 * @property-read int|null $registrations_count
 * @method static \Database\Factories\VaccinationCenterFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter query()
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter whereDailyCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter whereSiteUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationCenter withoutTrashed()
 */
	class VaccinationCenter extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $vaccine_center_id
 * @property \Illuminate\Support\Carbon|null $vaccination_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $formatted_status
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\VaccinationCenter|null $vaccineCenter
 * @method static \Database\Factories\VaccinationRegistrationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration query()
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration whereVaccinationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration whereVaccineCenterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|VaccinationRegistration withoutTrashed()
 */
	class VaccinationRegistration extends \Eloquent {}
}

