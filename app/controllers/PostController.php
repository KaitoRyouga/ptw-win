<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Work;
use App\Category;
use App\Event;
use App\Post;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class PostController
{

    public function index()
    {
        $posts = DB::table("posts")
            ->select(DB::raw('posts.*, users.username AS username'))
            ->join("users", "users.userId", "=", "posts.author")
            ->groupBy("posts.postId")
            ->get();

        $events = Event::all();

        Blade::render('user/home/index', compact('posts', 'events'));
    }

    public function search()
    {
        if (isset($_POST["search"])) {

            $search = $_POST["search"];

            $posts = DB::table("posts")
                ->where("posts.title", "like", "%" . $search . "%")
                ->select(DB::raw('posts.*, users.username AS username'))
                ->join("users", "users.userId", "=", "posts.author")
                ->groupBy("posts.postId")
                ->get();

            $events = Event::all();

            Blade::render('user/home/index', compact('posts', 'events', 'search'));
        } else {
            $posts = DB::table("posts")
                ->select(DB::raw('posts.*, users.username AS username'))
                ->join("users", "users.userId", "=", "posts.author")
                ->groupBy("posts.postId")
                ->get();

            $events = Event::all();

            Blade::render('user/home/index', compact('posts', 'events'));
        }
    }

    public function getPost($id)
    {

        $events = Event::all();

        $post = DB::table("posts")
            ->select(DB::raw('posts.*, users.username AS username, users.imgSrc AS imgAuthor'))
            ->where("postId", $id["postId"])
            ->join("users", "users.userId", "=", "posts.author")
            ->groupBy("posts.postId")
            ->get();

        Blade::render('user/home/description', compact('post', 'events'));
    }

    public function store()
    {
        $content = $_POST['content'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        if ($content === "" || $title === "" || $_FILES['imgupload']['tmp_name'] === "") {
            echo "<script>alert('Missing!'); window.location = '/';</script>";
        } else {

            $user = DB::table("users")
                ->where("username", $_SESSION["username"])
                ->get();

            if (is_uploaded_file($_FILES['imgupload']['tmp_name'])) {
                $image_src =  uploadFile($_FILES['imgupload'], 'product');
            }


            $post = new Post();
            $post->imgSrc = $image_src;
            $post->title = $title;
            $post->body = $content;
            $post->price = $price;
            $post->quantity = $quantity;
            $post->author = $user[0]->userId;

            $post->save();
            $_SESSION['success'] = "add";
            header('Location: /');
        }
    }

    public function update($id)
    {
        $content = $_POST['content'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        if ($content === "" || $title === "") {
            echo "<script>alert('Missing!'); window.location = '/posts';</script>";
        } else {


            DB::table('posts')
                ->where('postId', $id['postId'])
                ->update([
                    'body' => $content,
                    'title' => $title,
                    'price' => $price,
                    'quantity' => $quantity
                ]);

            $_SESSION['success'] = "edit";
            header('Location: /');
        }
    }

    public function editPost($id)
    {
        $post = DB::table("posts")
            ->where('postId', $id['postId'])
            ->get();

        $category = Category::all();

        Blade::render('user/home/edit', compact('post', 'category'));
    }

    public function deletePost($id)
    {
        DB::table('posts')
            ->where('postId', $id['postId'])
            ->delete();

        $_SESSION['success'] = "delete";
        header('Location: /');
    }
}
