<?php

namespace App\Repository\Eloquent;

use App\Models\Package;
use App\Repository\PackageRepositoryInterface;

class PackageRepository implements PackageRepositoryInterface {
    private Package $packageModel;

    public function __construct(Package $packageModel) {
        $this->packageModel = $packageModel;
    }

    public function createModel(array $data): Package
    {
        $this->packageModel->package_content = $data['package_content'];
        $this->packageModel->save();

        return $this->packageModel;
    }

    public function get(int $id) : ?Package {
        return $this->packageModel->findOrFail($id);
    }
}