<?php

namespace App;

use App\Helpers\Path;
use DevCoder\DotEnv;
use Database\Connection;

require 'functions.php';

if (file_exists(Path::root() . '/.env')) {
    (new DotEnv(Path::root() . '/.env'))->load();
}

Connection::make();

class App
{
    public static function config()
    {
        // TODO config methods
        return '';
    }
}