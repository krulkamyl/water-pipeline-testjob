<?php

namespace App\Models;

use App\Lib\MultiDatabaseConnector;
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
    
}
