<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Customer;
use App\Address;
use App\Cart;
use App\User;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class AdminCartController
{

    public function index()
    {
        $carts = Cart::all();
        $users = User::all();

        foreach ($carts as $keyC => $cart) {
            foreach ($users as $keyU => $user) {
                if ($cart->author == $user->userId) {
                    $cart->username = $user->username;
                    break;
                }
            }
        }

        Blade::render('carts/index', compact('carts'));
    }
}
