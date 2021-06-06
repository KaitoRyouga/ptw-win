<?php

namespace App\blade;

use Jenssegers\Blade\Blade as LaravelBlade;

class Blade
{

    public static function render($template, $data = [])
    {
        echo static::returnTemplate($template, $data);
    }


    public static function returnTemplate($template, $data = [])
    {
        $blade = new LaravelBlade(BASE_PATH . '/resources/views/', BASE_PATH . '/storage/views/cache/');
        $file = BASE_PATH . '/resources/views/' . $template . '.blade.php';
        if (file_exists($file)) {
            return $blade->render($template, $data);
        } else {
            $template = 'errors/404';
            return $blade->render($template, $data);
        }
    }
}
