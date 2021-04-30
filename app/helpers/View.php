<?php

namespace App\Helpers;

use App\Helpers\Facades\Log;
use Exception;
use Latte;
use App\App;

class View
{

    protected static $latte;

    /**
     * Configure the Latte Engine.
     */
    protected static function stirLatte() {
        self::$latte = new Latte\Engine;
        $latteTempDir = Path::root() . '/resources/tmp/latte';
        if (!is_dir($latteTempDir)) {
            mkdir($latteTempDir, 0774, true);
        }
        self::$latte->setTempDirectory($latteTempDir);
    }

    /**
     * Render a specified view.
     * 
     * @param $resource_view - The name of the view minus '.latte'
     */
    public static function render($resource_view, $data = [])
    {

        self::stirLatte();

        $app = [ 
            'app' => (Object) [
                'config' => App::config(),
                'env' => App::environment()
            ]
        ];

        $data = array_merge($app, $data);
        $data = (object) $data;
        

        try {
            $view_file = Path::root() . '/resources/views/' . $resource_view . '.latte'; 
            if (is_file($view_file)) {
                self::$latte->render($view_file, $data);
            }
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            if (strcasecmp(getenv('APP_ENV'), 'dev') == 0) {
                dd($e->getMessage());
            } else {
                self::notFound();
            }
                   
        }
   
    }

    /**
     * Set the http response and render a 404.
     */
    public static function notFound()
    {
        self::stirLatte();
        http_response_code(404);
        $view_file = Path::root() . '/resources/views/404.latte'; 
        self::$latte->render($view_file);
        die();
    }
}