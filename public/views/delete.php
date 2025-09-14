<?php
require_once __DIR__ . '/../../app/Classes/VehicleManager.php';

use App\Classes\VehicleManager;

$manager = new VehicleManager();
$id = $_GET['id'] ?? null;

if ($id) {
    $manager->deleteVehicle($id);
}

header("Location: ../index.php");
exit;
