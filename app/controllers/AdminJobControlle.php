<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Customer;
use App\Event;
use App\Post;
use App\Category;
use App\Job;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class AdminJobControlle extends Controller
{
    /**
     * @function index()
     * List All data from database
     */
    public function index()
    {
        $jobs = Job::all();
        Blade::render('jobs/index', compact('jobs'));
    }

    /**
     * @function create()
     * View form create
     * Type data : Array
     */
    public function create()
    {
        Blade::render('jobs/add');
    }
    /**
     * @function store()
     * Insert data to database
     * Type data : Array
     */
    public function store()
    {
        $content = $_POST['content'];
        $title = $_POST['title'];
        $location = $_POST['location'];
        $salary = $_POST['salary'];
        $deadline = $_POST['deadline'];

        if ($content === "" || $title === "" || $location === "" || $salary === "" || $deadline === "") {
            echo "<script>alert('Missing!'); window.location = '/jobs';</script>";
        } else {

            $job = new Job();
            $job->title = $title;
            $job->body = $content;
            $job->location = $location;
            $job->salary = $salary;
            $job->deadline = $deadline;

            $job->save();

            $_SESSION['success'] = "add";
            header('Location: /admin/jobs');
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
        $job = DB::table("jobs")
            ->where('jobId', $id['jobId'])
            ->get();
        $category = Category::all();

        Blade::render('jobs/edit', compact('job', 'category'));
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
        $title = $_POST['title'];
        $location = $_POST['location'];
        $salary = $_POST['salary'];
        $deadline = $_POST['deadline'];


        if ($content === "") {
            echo "<script>alert('Missing!'); window.location = '/admin/add-job';</script>";
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
            header('Location: /admin/posts');
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
        DB::table('jobs')
            ->where('jobId', $id['jobId'])
            ->delete();

        $_SESSION['success'] = "delete";
        header('Location: /admin/jobs');
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
