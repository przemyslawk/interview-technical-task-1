<?php

declare(strict_types=1);

namespace App\Infrastructure\Country\Persistence;

use App\Country\Domain\Model\CountryBlueprintInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $iso2
 * @property string|null $iso3
 */
class Country extends Model implements CountryBlueprintInterface
{
    public $timestamps = false;

    protected $table = 'countries';

    protected $fillable = [
        'name',
        'iso2',
        'iso3',
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIso2(): string
    {
        return $this->iso2;
    }

    public function getIso3(): string
    {
        return $this->iso3;
    }
}
