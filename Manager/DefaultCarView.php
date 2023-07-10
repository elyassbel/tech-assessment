<?php

namespace Manager;

require_once('Manager\CarViewInterface.php');

class DefaultCarView implements CarViewInterface
{
    private string $client;
    private string $path;

    public function __construct($client)
    {
        $this->client = $client;
        $this->path = realpath($_SERVER["DOCUMENT_ROOT"]).'/data/';
    }

    public function getCarsList(): array
    {
        $cars = [];
        $data = $this->jsonDecode('cars.json');
        foreach ($data as $datum) {
            if ($datum['customer'] === $this->client) {
                $cars[] = $datum;
            }
        }

        return $cars;
    }

    public function getCarDetails(int $id): array
    {
        $cars = $this->getCarsList();

        $i = array_search($id, array_column($cars, 'id'));
        if ($i !== false) {
            return $cars[$i];
        }

        return [];
    }

    public function getGaragesList(): array
    {
        $garages = [];
        $data = $this->jsonDecode('garages.json');
        foreach ($data as $datum) {
            if ($datum['customer'] === $this->client) {
                $garages[] = $datum;
            }
        }

        return $garages;
    }

    public function getGarageDetails(int $id): array
    {
        $garages = $this->getGaragesList();

        $i = array_search($id, array_column($garages, 'id'));
        if ($i !== false) {
            return $garages[$i];
        }

        return [];
    }

    protected function jsonDecode($fileName) {
        $json = file_get_contents($this->path.$fileName);
        return json_decode($json,true);
    }
}