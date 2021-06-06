<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Work;
use App\Education;
use App\Event;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class InfoController
{

    public function index()
    {

        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            if ($username !== "") {

                $user = DB::table("users")
                    ->where('username', $username)
                    ->get();

                $events = Event::all();

                Blade::render('user/info/index', compact('user', 'events'));
            } else {
                echo "<script>window.location = '/login';</script>";
            }
        } else {
            echo "<script>window.location = '/login';</script>";
        }
    }

    public function editSummary()
    {
        $summary = $_POST["summary"];

        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            if ($username !== '' || $summary !== '') {
                DB::table('users')
                    ->where('username', $username)
                    ->update([
                        'summary' => $summary,
                    ]);

                $_SESSION['success'] = "edit";
                header('Location: /info');
            } else {
                echo "<script>alert('Missing!'); window.location = '/info';</script>";
            }
        } else {
            echo "<script>window.location = '/login';</script>";
        }
    }

    public function editEducation()
    {

        $education = $_POST["education"];

        if (isset($_POST["userId"])) {
            $userId = $_POST["userId"];
            if ($userId !== '' || $education !== '') {
                DB::table('education')
                    ->where('userId', $userId)
                    ->update([
                        'name' => $education,
                    ]);

                $_SESSION['success'] = "edit";
                header('Location: /info');
            } else {
                echo "<script>alert('Missing!'); window.location = '/info';</script>";
            }
        } else {
            echo "<script>window.location = '/login';</script>";
        }
    }

    public function editWork()
    {
        $work = $_POST["work"];

        if (isset($_POST["userId"])) {
            $userId = $_POST["userId"];
            if ($userId !== '' || $work !== '') {
                DB::table('work')
                    ->where('userId', $userId)
                    ->update([
                        'name' => $work,
                    ]);

                $_SESSION['success'] = "edit";
                header('Location: /info');
            } else {
                echo "<script>alert('Missing!'); window.location = '/info';</script>";
            }
        } else {
            echo "<script>window.location = '/login';</script>";
        }
    }

    public function editInfo()
    {

        if (isset($_SESSION["username"])) {

            $contact = $_POST["contact"];
            $education = $_POST["education"];
            $work = $_POST["work"];
            $experience = $_POST["experience"];
            $summary = $_POST["summary"];
            $username = $_SESSION["username"];


            if (isset($_FILES['file'])) {
                $image_src =  uploadFile($_FILES['file'], 'product');
                DB::table('users')
                    ->where('username', $username)
                    ->update([
                        'imgSrc' => $image_src
                    ]);
            }

            DB::table('users')
                ->where('username', $username)
                ->update([
                    'email' => $contact,
                    'education' => $education,
                    'work' => $work,
                    'experience' => $experience,
                    'summary' => $summary,
                ]);

            $_SESSION['success'] = "edit";
        } else {
            echo "<script>window.location = '/login';</script>";
        }
    }

    public function addEducation()
    {

        $education = $_POST["education"];

        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            if ($username !== '' || $education !== '') {

                $user = DB::table("users")
                    ->where('username', $username)
                    ->join("education", "education.userId", "=", "users.userId")
                    ->groupBy("users.userId")
                    ->get("users.userId");

                $edu = new Education();
                $edu->userId = $user[0]->userId;
                $edu->name = $education;

                $edu->save();

                $_SESSION['success'] = "add";
                header('Location: /info');
            } else {
                echo "<script>alert('Missing!'); window.location = '/info';</script>";
            }
        } else {
            echo "<script>window.location = '/login';</script>";
        }
    }

    public function addWork()
    {

        $work = $_POST["work"];

        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            if ($username !== '' || $work !== '') {

                $user = DB::table("users")
                    ->where('username', $username)
                    ->join("work", "work.userId", "=", "users.userId")
                    ->groupBy("users.userId")
                    ->get("users.userId");

                var_dump($user[0]->userId);

                $w = new Work();
                $w->userId = 11;
                $w->name = $work;

                $w->save();

                $_SESSION['success'] = "add";
                header('Location: /info');
            } else {
                echo "<script>alert('Missing!'); window.location = '/info';</script>";
            }
        } else {
            echo "<script>window.location = '/login';</script>";
        }
    }
}
