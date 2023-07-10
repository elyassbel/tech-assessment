<?php

namespace Manager;

require_once('Manager\CarViewInterface.php');

class CarViewDecorator implements CarViewInterface
{
    protected CarViewInterface $carView;

    public function __construct(CarViewInterface $carView)
    {
        $this->carView = $carView;
    }

    public function getCarsList(): array
    {
        return $this->carView->getCarsList();
    }

    public function getCarDetails(int $id): array
    {
        return $this->carView->getCarDetails($id);
    }

    public function getGaragesList(): array
    {
        return $this->carView->getGaragesList();
    }

    public function getGarageDetails(int $id): array
    {
        return $this->carView->getGarageDetails($id);
    }
}
