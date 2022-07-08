<?php

declare(strict_types=1);

namespace App\Infrastructure\UserDetail\Persistence;

use App\Infrastructure\Country\Persistence\Country;
use App\UserDetail\Domain\Model\UserDetailBlueprintInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $citizenship_country_id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property Country $country
 */
class UserDetail extends Model implements UserDetailBlueprintInterface
{
    public $timestamps = false;

    protected $table = 'user_details';

    protected $fillable = [
        'user_id',
        'citizenship_country_id',
        'first_name',
        'last_name',
        'phone_number',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getCitizenshipCountryId(): int
    {
        return $this->citizenship_country_id;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'citizenship_country_id', 'id');
    }

    public function getCountry(): Country
    {
        return $this->country;
    }
}
