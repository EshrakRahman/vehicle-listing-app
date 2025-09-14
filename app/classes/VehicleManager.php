<?php
namespace App\Classes;

require_once __DIR__ . '/FileHandler.php';
require_once __DIR__ . '/VehicleActions.php';
require_once __DIR__ . '/VehicleBase.php';

class VehicleManager extends VehicleBase implements VehicleActions {
    use FileHandler;

    public function __construct($name = '', $type = '', $price = '', $image = '') {
        parent::__construct($name, $type, $price, $image);
    }

    public function getDetails() {
        return [
            "name" => $this->name,
            "type" => $this->type,
            "price" => $this->price,
            "image" => $this->image
        ];
    }

    public function addVehicle($data) {
        $vehicles = $this->readFile();
        $data['id'] = uniqid();
        $vehicles[] = $data;
        $this->writeFile($vehicles);
    }

    public function editVehicle($id, $data) {
        $vehicles = $this->readFile();
        foreach ($vehicles as &$vehicle) {
            if ($vehicle['id'] === $id) {
                $vehicle = array_merge($vehicle, $data);
            }
        }
        $this->writeFile($vehicles);
    }

    public function deleteVehicle($id) {
        $vehicles = $this->readFile();
        $vehicles = array_filter($vehicles, fn($v) => $v['id'] !== $id);
        $this->writeFile(array_values($vehicles));
    }

    public function viewVehicle($id) {
        $vehicles = $this->readFile();
        foreach ($vehicles as $vehicle) {
            if ($vehicle['id'] === $id) {
                return $vehicle;
            }
        }
        return null;
    }

    public function getVehicles() {
        return $this->readFile();
    }
}
