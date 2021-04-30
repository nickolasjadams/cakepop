<?php

namespace App\Helpers;

use App\Helpers\Facades\Log;
use Exception;
use Latte;
use App\App;

class View
{
    /**
     * Render a specified view.
     * 
     * @param $resource_view - The name of the view minus '.latte'
     */
    public static function render($resource_view, $data = [])
    {

        $app = [ 
            'app' => (Object) [
                'config' => App::config(),
                'env' => App::environment()
            ]
        ];

        $data = array_merge($app, $data);

        $data = (object) $data;
        // foreach($data as $key => $value) {
        //     $$key = $value;
        // }

        $latte = new Latte\Engine;
        $latteTempDir = Path::root() . '/resources/tmp/latte';
        if (!is_dir($latteTempDir)) {
            mkdir($latteTempDir, 0774, true);
        }
        $latte->setTempDirectory($latteTempDir);

        try {
            $view_file = Path::root() . '/resources/views/' . $resource_view . '.latte'; 
            if (is_file($view_file)) {
                $latte->render($view_file, $data);
            }
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            // d($e->getTraceAsString());
            // header('Location: /', 404);
            if (strcasecmp(getenv('APP_ENV'), 'dev') == 0) {
                dd($e->getMessage());
            } else {
                die('404 - Error: View not found');
            }
            
            
        }

        
    }
}