<?php

use App\Lib\MultiDatabaseConnector;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

class CreateDatabasesCitiesWithTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (Config::get('constants.cities') as $city) {
            if(MultiDatabaseConnector::createDatabaseTable($city)) {

                // to set default table to migration
                MultiDatabaseConnector::setDatabaseConnection($city);
                
                Artisan::call('migrate', array(
                    '--database' => $city,
                    '--path' => '/database/migrations/ignored/2022_01_04_090240_create_reports_table.php'
                ));
            }
            else {
                throw new Exception("Database is not created");
            };
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach (Config::get('constants.cities') as $city) {
            MultiDatabaseConnector::dropDatabaseTable($city);
        }
    }
}
