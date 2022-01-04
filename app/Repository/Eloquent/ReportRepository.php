<?php

namespace App\Repository\Eloquent;

use App\Models\Report;
use App\Repository\ReportRepositoryInterface;

class ReportRepository implements ReportRepositoryInterface {
    private Report $reportModel;

    public function __construct(Report $reportModel) {
        $this->reportModel = $reportModel;
    }

    public function createModel(array $data): Report
    {
        $this->reportModel->package_id = $data['package_id'];
        $this->reportModel->package_content = $data['package_content'];
        $this->reportModel->save();

        return $this->reportModel;
    }
}