<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Customer;
use App\Event;
use App\Cart;
use App\Category;
use App\Job;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class CartController
{
    /**
     * @function index()
     * List All data from database
     */
    public function index()
    {

        if (isset($_SESSION["username"])) {

            $post = DB::table("posts")
                ->get(["postId", "price", "imgSrc", "title"]);

            $cart = $_POST;
            $newCart = [];
            $count = 0;

            $new = [];

            if (isset($_SESSION["cart"])) {
                foreach ($_SESSION["cart"] as $key => $value) {
                    if (count($value) != 0) {
                        $new[] = $value;
                    }
                }

                $_SESSION["cart"] = $new;
            }

            if (!isset($_POST["postId"]) && !isset($_POST["quantity"])) {
                Blade::render('user/cart/index', compact('post'));
            } else {
                if (isset($_SESSION["cart"])) {

                    foreach ($_SESSION["cart"] as $key => $value) {
                        if ($value["postId"] == $cart["postId"]) {
                            $_SESSION["cart"][$key]["quantity"] = $_SESSION["cart"][$key]["quantity"] + $cart["quantity"];
                            $count += 1;
                        }
                    }

                    if ($count == 0) {
                        $_SESSION["cart"][] = $cart;
                    }
                } else {
                    $_SESSION["cart"][] = $cart;
                }

                Blade::render('user/cart/index', compact('post'));
            }
        } else {
            echo "<script>window.location = '/login';</script>";
        }
    }

    public function store()
    {
        if (isset($_SESSION["username"])) {
            $post = DB::table("posts")
                ->get();

            $user = DB::table("users")
                ->where("username", $_SESSION["username"])
                ->get();

            $sum = 0;
            foreach ($_SESSION["cart"] as $key => $cartTotal) {
                foreach ($post as $key => $p) {
                    if ($p->postId == $cartTotal["postId"]) {
                        $sum = $sum + $p->price * $cartTotal["quantity"];
                        break;
                    }
                }
            }

            $cart = new Cart();
            $cart->total = $sum;
            $cart->product = serialize($_SESSION["cart"]);
            $cart->author = $user[0]->userId;

            $cart->save();

            unset($_SESSION["cart"]);

            header("Location: /");
        } else {
            echo "<script>window.location = '/login';</script>";
        }
    }

    /**
     * @function create()
     * View form create
     * Type data : Array
     */
    public function getCart()
    {
        Blade::render('user/cart/description');
    }

    public function getSum()
    {
        $cart = $_POST;
        $newCart = [];

        foreach ($_SESSION["cart"] as $key => $cartTotal) {
            if ($cartTotal["postId"] == $cart["postId"]) {
                $newCart[] = $cart;
            } else {
                $newCart[] = $cartTotal;
            }
        }

        $_SESSION["cart"] = $newCart;

        $post = DB::table("posts")
            ->get();

        $sum = 0;
        foreach ($_SESSION["cart"] as $key => $cartTotal) {
            foreach ($post as $key => $p) {
                if ($p->postId == $cartTotal["postId"]) {
                    $sum = $sum + $p->price * $cartTotal["quantity"];
                    break;
                }
            }
        }

        echo json_encode($sum);
    }

    public function remove($id)
    {
        $cart = $id["postId"];

        $newCart = [];

        foreach ($_SESSION["cart"] as $key => $value) {
            if ($value["postId"] != $cart) {
                $newCart[] = $value;
            }
        }

        $_SESSION["cart"] = $newCart;
 
        $post = DB::table("posts")
            ->get(["postId", "price", "imgSrc", "title"]);

        Blade::render('user/cart/index', compact('post'));
    }

    public function getPost($id)
    {
        $post = DB::table("posts")
            ->where("postId", $id["postId"])
            ->get();

        echo json_encode($post);
    }
    public function getbougth()
    {
        $cartsRaw = Cart::all();
        $carts = [];

        $user = DB::table("users")
            ->where("username", $_SESSION["username"])
            ->get();

        foreach ($cartsRaw as $key => $value) {
            if ($value->author == $user[0]->userId) {
                $carts[] = $value;
            }
        }

        $post = DB::table("posts")
            ->get(["postId", "price", "imgSrc", "title"]);


        Blade::render('user/cart/bought', compact('post', 'carts'));
    }
}
