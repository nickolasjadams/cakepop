<?php

namespace App;

use App\Helpers\Path;
use DevCoder\DotEnv;

require 'functions.php';

if (file_exists(Path::root() . '/.env')) {
    (new DotEnv(Path::root() . '/.env'))->load();
}

App::configureEnvironments([
    '*' => [
        'sitename' => 'Example Site'
    ],
    'development' => [
        'example' => 'dev_example'
    ],
    'testing' => [
        'example' => 'testing_example'
    ],
    'production' => [
        'example' => 'production_example'
    ]
]);

class App
{
    public static $config;

    /**
     * Configures the app environments.
     * 
     * If wild card '*' array may be included in the $environments array,
     * it will be applied to all environments.
     * 
     * @param array $environments
     */
    public static function configureEnvironments($environments = []) {
        
        if (isset($environments['*'])) {
            
            foreach ($environments as $env => $config_array) {
                
                if ($env != '*') {
                    $environments[$env] = array_merge($environments['*'], $config_array);
                }
            }
        }
        self::$config = (Object) $environments[getenv('APP_ENV')];
    }

    /**
     * Returns the app config object.
     * 
     * @return Object
     */
    public static function config() {
        return self::$config;
    }

    /**
     * Returns the current environment set in the .env file.
     * 
     * @return String
     */
    public static function environment() {
        return getenv('APP_ENV');
    }
}