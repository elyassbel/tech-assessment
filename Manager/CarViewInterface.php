<?php

namespace Manager;

interface CarViewInterface
{
    public function getCarsList(): array;

    public function getCarDetails(int $id): array;

    public function getGaragesList(): array;

    public function getGarageDetails(int $id): array;
}