<?php

namespace App\Lib;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;


class MultiDatabaseConnector {

    public static function setDatabaseConnection(string $databaseName, bool $default = false) : void {
        if (!Config::has("database.connections.$databaseName")) {
            $default = Config::get('database.connections.mysql');
            $default['database'] = $databaseName;
            Config::set("database.connections.$databaseName", $default);
            
            if ($default) 
                Config::set("database.connections.mysql", $default);
            
        }
    }

    public static function createDatabaseTable(string $databaseName) : bool {
        return DB::statement("create database $databaseName");
    }

    public static function dropDatabaseTable(string $databaseName) : bool {
        return DB::statement("drop table if exists `$databaseName`");
    }   
}