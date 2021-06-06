<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Customer;
use App\Event;
use App\Category;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class AdminEventControlle extends Controller
{
    /**
     * @function index()
     * List All data from database
     */
    public function index()
    {
        $events = Event::all();
        Blade::render('events/index', compact('events'));
    }

    /**
     * @function create()
     * View form create
     * Type data : Array
     */
    public function create()
    {
        Blade::render('events/add');
    }
    /**
     * @function store()
     * Insert data to database
     * Type data : Array
     */
    public function store()
    {
        $content = $_POST['content'];

        if ($content === "" || $_FILES['imgupload']['tmp_name'] === "") {
            echo "<script>alert('Missing!'); window.location = '/admin/add-event';</script>";
        } else {

            if (is_uploaded_file($_FILES['imgupload']['tmp_name'])) {
                $image_src =  uploadFile($_FILES['imgupload'], 'product');
            }


            $event = new Event();
            $event->imgSrc = $image_src;
            $event->body = $content;

            $event->save();
            $_SESSION['success'] = "add";
            header('Location: /admin/events');
        }
    }
    /**
     * @function show()
     * Get detail a data in database
     * Type id : number
     * Get id from URl
     */
    public function show($id)
    {
        $event = DB::table("events")
            ->where('eventId', $id['eventId'])
            ->get();

        Blade::render('events/edit', compact('event'));
    }
    /**
     * @function update()
     * Update data with id to database
     * Type id :number
     * Get id from URL
     * Type data : Array
     */
    public function update($id)
    {
        $content = $_POST['content'];

        if ($content === "") {
            echo "<script>alert('Missing!'); window.location = '/admin/add-event';</script>";
        } else {

            if (($_FILES["imgupload"]["size"] !== 0)) {
                if (is_uploaded_file($_FILES['imgupload']['tmp_name'])) {
                    $image_src =  uploadFile($_FILES['imgupload'], 'product');
                    DB::table('events')
                        ->where('eventId', $id['eventId'])
                        ->update(['imgSrc' => $image_src]);
                }
            } else {
                DB::table('events')
                    ->where('eventId', $id['eventId'])
                    ->update(['body' => $content]);
            }

            $_SESSION['success'] = "edit";
            header('Location: /admin/events');
        }
    }
    /**
     * @function delete()
     * Delete data with id
     * Type id : number
     * Example : Product::delete()
     */
    public function delete($id)
    {
        DB::table('events')
            ->where('eventId', $id['eventId'])
            ->delete();

        $_SESSION['success'] = "delete";
        header('Location: /admin/events');
    }

    public function upload()
    {
        var_dump($_POST);
        var_dump($_GET);
    }

    public function search()
    {
    }

    public function check()
    {
    }

    public function changeStatus($id)
    {
    }
}
