<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Customer;
use App\Event;
use App\Post;
use App\Category;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class AdminPostControlle extends Controller
{
    /**
     * @function index()
     * List All data from database
     */
    public function index()
    {
        $posts = Post::all();
        Blade::render('posts/index', compact('posts'));
    }

    /**
     * @function create()
     * View form create
     * Type data : Array
     */
    public function create()
    {
        Blade::render('posts/add');
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

        if ($content === "" || $title === "" || $_FILES['imgupload']['tmp_name'] === "") {
            echo "<script>alert('Missing!'); window.location = '/admin/add-post';</script>";
        } else {

            if (is_uploaded_file($_FILES['imgupload']['tmp_name'])) {
                $image_src =  uploadFile($_FILES['imgupload'], 'product');
            }


            $post = new Post();
            $post->imgSrc = $image_src;
            $post->title = $title;
            $post->body = $content;

            $post->save();
            $_SESSION['success'] = "add";
            header('Location: /admin/posts');
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
        $post = DB::table("posts")
            ->where('postId', $id['postId'])
            ->get();

        Blade::render('posts/edit', compact('post'));
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

        if ($content === "") {
            echo "<script>alert('Missing!'); window.location = '/admin/add-post';</script>";
        } else {

            if (($_FILES["imgupload"]["size"] !== 0)) {
                if (is_uploaded_file($_FILES['imgupload']['tmp_name'])) {
                    $image_src =  uploadFile($_FILES['imgupload'], 'product');
                    DB::table('posts')
                        ->where('postId', $id['postId'])
                        ->update(['imgSrc' => $image_src]);
                }
            } else {
                DB::table('posts')
                    ->where('postId', $id['postId'])
                    ->update(['body' => $content, 'title' => $title]);
            }

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
        DB::table('posts')
            ->where('postId', $id['postId'])
            ->delete();

        $_SESSION['success'] = "delete";
        header('Location: /admin/posts');
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
