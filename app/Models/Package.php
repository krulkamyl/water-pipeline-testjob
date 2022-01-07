<?php

namespace App\Models;

use App\Lib\MultiDatabaseConnector;
use App\Repository\Eloquent\ReportRepository;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

    protected $table = 'packages';

    public $timestamps = false;


    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        $this->setConnection(MultiDatabaseConnector::setDatabaseConnection('collector'));
    }

    /**
     * Parsing data to city report model table
     *
     * @return Report
     */
    public function parseData()
    {
        $package_content = substr($this->package_content,0,6);
        $city = str_replace($package_content, '', $this->package_content );

        MultiDatabaseConnector::setDatabaseConnection($city);

        $report = new Report();
        $report->setConnection($city);
        $reportRepository = new ReportRepository($report);

        return $reportRepository->createModel([
            'package_id' => $this->id,
            'package_content' => $package_content
        ]);
    }

}
