<?php

namespace App\Repository;

use App\Models\Report;

interface ReportRepositoryInterface
{
    public function createModel(array $data) : Report;

}
