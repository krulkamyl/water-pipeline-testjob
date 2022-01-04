<?php

use App\Lib\MultiDatabaseConnector;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Migrations\Migration;

class CreateCollectorDatabase extends Migration
{

    const DATABASE_NAME = 'collector';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(MultiDatabaseConnector::createDatabaseTable(self::DATABASE_NAME)) {

            // to set default table to migration
            MultiDatabaseConnector::setDatabaseConnection(self::DATABASE_NAME);

            Artisan::call('migrate', array(
                '--database' => self::DATABASE_NAME,
                '--path' => '/database/migrations/ignored/2022_01_04_092911_create_packages_table.php'
            ));
        }
        else {
            throw new Exception("Database is not created");
        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        MultiDatabaseConnector::dropDatabaseTable(self::DATABASE_NAME);
    }
}
