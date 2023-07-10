<?php

namespace Customs\ClientB\Modules;

require 'Manager\CarViewDecorator.php';

use Manager\CarViewDecorator;

class CarViewB extends CarViewDecorator
{
    public function getCarsList(): array
    {
        $cars = parent::getCarsList();

        $headers = $this->getHeaders();
        $customizedCarsList = array_map(function ($item) use ($headers) {
            return array_intersect_key($item, array_flip($headers));
        }, $cars);

        $garages = $this->getGaragesList();
        foreach ($customizedCarsList as &$car) {
            $garageId = $car['garageId'];
            foreach ($garages as $garage) {
                if ($garage['id'] === $garageId) {
                    $car['garageTitle'] = $garage['title'];
                }
            }
            if (!isset($car['garageTitle'])) {
                $car['garageTitle'] = 'N\A';
            }
        }

        return $customizedCarsList;
    }

    private function getHeaders(): array
    {
        return ['id', 'modelName', 'brand', 'garageId'];
    }
}
