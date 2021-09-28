<?php

namespace App\Storage;

use App\Person;

interface Storage
{
    public function getById(string $id): Person;
    public function save(array $persons): void;
    public function read(): array;
    public function delete(Person $person): void;
}