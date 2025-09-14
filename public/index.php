<?php
require_once __DIR__ . '/../app/Classes/VehicleManager.php';

use App\Classes\VehicleManager;

$manager = new VehicleManager();
$vehicles = $manager->getVehicles();

include __DIR__ . '/views/header.php';
?>

<div class="container my-4">
    <h1>Vehicle Listing</h1>
    <a href="./views/add.php" class="btn btn-success mb-4">Add Vehicle</a>
    <div class="row">
        <?php foreach ($vehicles as $v): ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="<?= $v['image'] ?>" class="card-img-top" style="height:200px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $v['name'] ?></h5>
                        <p class="card-text">Type: <?= $v['type'] ?></p>
                        <p class="card-text">Price: $<?= $v['price'] ?></p>
                        <a href="./views/edit.php?id=<?= $v['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="./views/delete.php?id=<?= $v['id'] ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
