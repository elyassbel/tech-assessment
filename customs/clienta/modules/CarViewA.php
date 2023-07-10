<?php

namespace Customs\ClientA\Modules;

require 'Manager\CarViewDecorator.php';

use Manager\CarViewDecorator;

class CarViewA extends CarViewDecorator
{
    public function getCarsList(): array
    {
        $cars = parent::getCarsList();

        $headers = $this->getHeaders();
        $customizedList = array_map(function ($item) use ($headers) {
            return array_intersect_key($item, array_flip($headers));
        }, $cars);

        foreach ($customizedList as &$car) {
            $car['year'] = gmdate("Y", $car['year']);
        }

        return $customizedList;
    }

    private function getHeaders(): array
    {
        return ['id', 'modelName', 'brand', 'year', 'power'];
    }
}
