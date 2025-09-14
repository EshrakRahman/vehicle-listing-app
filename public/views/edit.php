<?php
require_once __DIR__ . '/../../app/Classes/VehicleManager.php';

use App\Classes\VehicleManager;

$manager = new VehicleManager();
$id = $_GET['id'] ?? null;
$vehicle = $manager->viewVehicle($id);

if (!$vehicle) {
    die("Vehicle not found!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        "name" => $_POST['name'],
        "type" => $_POST['type'],
        "price" => $_POST['price'],
        "image" => $_POST['image']
    ];
    $manager->editVehicle($id, $data);
    header("Location: ../index.php");
    exit;
}

include __DIR__ . '/header.php';
?>

<div class="container my-4">
    <h1>Edit Vehicle</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Vehicle Name</label>
            <input type="text" name="name" class="form-control" value="<?= $vehicle['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vehicle Type</label>
            <input type="text" name="type" class="form-control" value="<?= $vehicle['type'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="<?= $vehicle['price'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control" value="<?= $vehicle['image'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Vehicle</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
