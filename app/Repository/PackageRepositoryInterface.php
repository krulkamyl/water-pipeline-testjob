<?php

namespace App\Repository;

use App\Models\Package;

interface PackageRepositoryInterface
{
    public function createModel(array $data) : Package;

    public function get(int $id): ?Package;
}
