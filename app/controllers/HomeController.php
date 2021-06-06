<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Work;
use App\Education;
use App\User;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class HomeController
{

    public function index()
    {
        Blade::render('user/home/index');
    }
}
