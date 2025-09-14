<?php
namespace App\Classes;

trait FileHandler {
    private $filePath = __DIR__ . '/../../data/vehicles.json';

    public function readFile(): array {
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }
        $content = file_get_contents($this->filePath);
        return json_decode($content, true) ?? [];
    }

    public function writeFile(array $data): void {
        $json = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($this->filePath, $json);
    }
}
