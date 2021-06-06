<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Work;
use App\Education;
use App\Event;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class EventController
{

    public function index()
    {
        $events = Event::all();

        Blade::render('user/event/index', compact('events'));
    }

    public function getEvent($id)
    {
        $event = DB::table("events")
            ->where("eventId", $id["eventId"])
            ->get();

        echo json_encode($event);
    }
}
