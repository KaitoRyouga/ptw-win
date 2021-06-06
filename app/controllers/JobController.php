<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Work;
use App\Event;
use App\Job;
use App\Category;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class JobController
{

    public function index()
    {
        $events = Event::all();
        $category = Category::all();

        $jobs = DB::table("jobs")
            ->select(DB::raw('jobs.*, users.username AS username, users.imgSrc AS imgAuthor'))
            ->join("users", "users.userId", "=", "jobs.author")
            ->groupBy("jobs.jobId")
            ->get();

        Blade::render('user/job/index', compact('jobs', 'events', 'category'));
    }

    public function search()
    {

        if (isset($_POST["search"])) {
            $events = Event::all();
            $category = Category::all();
            $search = $_POST["search"];

            $jobs = DB::table("jobs")
                ->where("jobs.title", "like", "%" . $search . "%")
                ->select(DB::raw('jobs.*, users.username AS username, users.imgSrc AS imgAuthor'))
                ->join("users", "users.userId", "=", "jobs.author")
                ->groupBy("jobs.jobId")
                ->get();

            Blade::render('user/job/index', compact('jobs', 'events', 'category', 'search'));
        } else {
            $events = Event::all();
            $category = Category::all();

            $jobs = DB::table("jobs")
                ->select(DB::raw('jobs.*, users.username AS username, users.imgSrc AS imgAuthor'))
                ->join("users", "users.userId", "=", "jobs.author")
                ->groupBy("jobs.jobId")
                ->get();

            Blade::render('user/job/index', compact('jobs', 'events', 'category'));
        }
    }

    public function addJob()
    {
        $content = $_POST['content'];
        $title = $_POST['title'];
        $location = $_POST['location'];
        $salary = $_POST['salary'];
        $deadline = $_POST['deadline'];

        if ($content === "" || $title === "" || $location === "" || $salary === "" || $deadline === "") {
            echo "<script>alert('Missing!'); window.location = '/jobs';</script>";
        } else {

            $user = DB::table("users")
                ->where("username", $_SESSION["username"])
                ->get();

            $job = new Job();
            $job->title = $title;
            $job->body = $content;
            $job->location = $location;
            $job->salary = $salary;
            $job->deadline = $deadline;
            $job->author = $user[0]->userId;

            $job->save();
            $_SESSION['success'] = "add";
            header('Location: /jobs');
        }
    }

    public function getJob($id)
    {

        $events = Event::all();

        $job = DB::table("jobs")
            ->select(DB::raw('jobs.*, users.username AS username, users.imgSrc AS imgAuthor'))
            ->where('jobId', $id['jobId'])
            ->join("users", "users.userId", "=", "jobs.author")
            ->groupBy("jobs.jobId")
            ->get();

        Blade::render('user/job/description', compact('job', 'events'));
    }

    public function editJob($id)
    {
        $job = DB::table("jobs")
            ->where('jobId', $id['jobId'])
            ->get();

        $category = Category::all();

        Blade::render('user/job/edit', compact('job', 'category'));
    }

    public function update($id)
    {
        $content = $_POST['content'];
        $title = $_POST['title'];
        $location = $_POST['location'];
        $salary = $_POST['salary'];
        $deadline = $_POST['deadline'];

        if ($content === "" || $title === "" || $location === "" || $salary === "" || $deadline === "") {
            echo "<script>alert('Missing!'); window.location = '/jobs';</script>";
        } else {


            DB::table('jobs')
                ->where('jobId', $id['jobId'])
                ->update([
                    'body' => $content,
                    'title' => $title,
                    'location' => $location,
                    'salary' => $salary,
                    'deadline' => $deadline,
                ]);

            $_SESSION['success'] = "edit";
            header('Location: /jobs');
        }
    }

    public function getInfo()
    {

        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            $toUser = $_POST["user"];

            $user = DB::table("users")
                ->where('username', $username)
                ->get();

            if ($toUser == $user[0]->userId) {
                echo json_encode("");
            } else {
                $newuser = DB::table("users")
                    ->where('userId', $toUser)
                    ->get();
                echo json_encode($newuser);
            }
        } else {
            echo json_encode("");
        }
    }

    public function getUser()
    {

        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];

            $user = DB::table("users")
                ->where('username', $username)
                ->get();

            echo json_encode($user);
        } else {
            echo json_encode("");
        }
    }

    public function deleteJob($id)
    {
        DB::table('jobs')
            ->where('jobId', $id['jobId'])
            ->delete();

        $_SESSION['success'] = "delete";
        header('Location: /jobs');
    }

    public function filter($id)
    {

        $events = Event::all();
        $category = Category::all();

        $job = $id["job"];
        if ($job === "works") {
            $jobs = DB::table("jobs")
                ->where("category", 2)
                ->select(DB::raw('jobs.*, users.username AS username, users.imgSrc AS imgAuthor'))
                ->join("users", "users.userId", "=", "jobs.author")
                ->groupBy("jobs.jobId")
                ->get();
        } else if ($job === "interns") {
            $jobs = DB::table("jobs")
                ->where("category", 0)
                ->select(DB::raw('jobs.*, users.username AS username, users.imgSrc AS imgAuthor'))
                ->join("users", "users.userId", "=", "jobs.author")
                ->groupBy("jobs.jobId")
                ->get();
        } else {
            $jobs = DB::table("jobs")
                ->select(DB::raw('jobs.*, users.username AS username, users.imgSrc AS imgAuthor'))
                ->join("users", "users.userId", "=", "jobs.author")
                ->groupBy("jobs.jobId")
                ->get();
        }

        Blade::render('user/job/index', compact('jobs', 'events', 'category'));
    }
}
