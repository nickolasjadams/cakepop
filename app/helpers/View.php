<?php

namespace App\Helpers;

use App\Helpers\Facades\Log;
use Exception;
use Latte;

class View
{
    /**
     * Render a specified view.
     * 
     * @param $resource_view - The name of the view minus '.view.php'
     */
    public static function render($resource_view, $data = [])
    {
        
        $latte = new Latte\Engine;
        $latte->setTempDirectory(Path::root() . '/resources/tmp/latte');

        $data = (object) $data;
        foreach($data as $key => $value) {
            $$key = $value;
        }

        
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