<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once __DIR__.'/../app/config/config.php';
require_once '../app/routes/Web.php';
new \App\routes\Router($router);