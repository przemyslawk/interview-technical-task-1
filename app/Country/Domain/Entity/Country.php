<?php

declare(strict_types=1);

namespace App\Country\Domain\Entity;

class Country
{
    private int $id;
    private string $name;
    private string $iso2;
    private string $iso3;

    public function __construct(int $id, string $name, string $iso2, string $iso3)
    {
        $this->id = $id;
        $this->name = $name;
        $this->iso2 = $iso2;
        $this->iso3 = $iso3;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getIso2(): string
    {
        return $this->iso2;
    }

    public function setIso2(string $iso2): void
    {
        $this->iso2 = $iso2;
    }

    public function getIso3(): string
    {
        return $this->iso3;
    }

    public function setIso3(string $iso3): void
    {
        $this->iso3 = $iso3;
    }
}
