<?php

declare(strict_types=1);

namespace App\Country\Domain\Model;

interface CountryBlueprintInterface
{
    public function getId(): int;
    public function getName(): string;
    public function getIso2(): string;
    public function getIso3(): string;
}
