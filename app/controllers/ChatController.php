<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Customer;
use App\User;
use App\Msg;
use Illuminate\Database\Capsule\Manager as DB;

new Database;
class ChatController
{

    public function index()
    {

        // $users = User::all(["userId", "username"]);

        if (isset($_SESSION["username"])) {

            $newUsers = [];

            $users = DB::table('users')
                ->get(["userId", "username"]);


            foreach ($users as $key => $value) {
                $newUsers[$value->userId] = $value->username;
            }

            $user = DB::table('users')
                ->where(["username" => $_SESSION["username"]])
                ->get("userId");

            $fromUser = $user[0]->userId;

            $bar = DB::table("messages")
                ->where(['fromUser' => $fromUser])
                ->get();

            $bar2 = DB::table("messages")
                ->where(['toUser' => $fromUser])
                ->get();

            if (count($bar) != 0 && count($bar2) != 0) {

                $taskbar = [];

                $taskbar1 = [];
                foreach ($bar as $key => $value) {
                    $taskbar1[$value->toUser] = $value->body;
                }

                $taskbar2 = [];
                foreach ($bar2 as $key => $value) {
                    $taskbar2[$value->fromUser] = $value->body;
                }

                foreach ($taskbar1 as $key => $value) {
                    $taskbar[$key] = $value;
                }

                foreach ($taskbar2 as $key => $value) {
                    $taskbar[$key] = $value;
                }

            } else if (count($bar) == 0) {
                $taskbar2 = [];
                foreach ($bar2 as $key => $value) {
                    $taskbar2[$value->fromUser] = $value->body;
                }
                $taskbar = $taskbar2;
            } else if (count($bar2) == 0) {
                $taskbar1 = [];
                foreach ($bar as $key => $value) {
                    $taskbar1[$value->toUser] = $value->body;
                }
                $taskbar = $taskbar1;
            }

            // echo "\n";
            // print_r($taskbar1);
            // echo "\n";
            Blade::render('chat/index', compact('taskbar', 'newUsers'));
        } else {
            echo "<script>window.location = '/login';</script>";
        }
    }

    public function sendMsg()
    {
        $body_msg = htmlentities($_POST["body_msg"]);
        $fromUser = $_POST["fromUser"];
        $toUser = $_POST["toUser"];
        $body_msg = trim($body_msg);

        if ($body_msg !== '' && $fromUser !== '' && $toUser !== '') {

            $msg = new Msg();
            $msg->body = $body_msg;
            $msg->fromUser = $fromUser;
            $msg->toUser = $toUser;

            $msg->save();
        }
    }

    public function getMsg()
    {

        $fromUser = $_POST["fromUser"];
        $toUser = $_POST["toUser"];

        if (isset($fromUser) && isset($toUser)) {
            if ($fromUser != "" && $toUser != "") {

                $mess = DB::table("messages")
                    ->where(['fromUser' => $fromUser, 'toUser' => $toUser])
                    ->get();

                $messReceive = DB::table("messages")
                    ->where(['toUser' => $fromUser, 'fromUser' => $toUser])
                    ->get();

                $toUserLength = $_POST["lChat"];
                $fromUserLength = $_POST["rChat"];

                $a = [];
                $a[] = $mess;
                $a[] = $messReceive;

                if ($toUserLength == 0 && $fromUserLength == 0) {
                    echo json_encode($a);
                } else {
                    if ((int)$toUserLength + (int)$fromUserLength != count($mess)) {
                        echo json_encode($a);
                    } else {
                        echo json_encode("");
                    }
                }
            }
        } else {
            echo json_encode("");
        }
    }

    public function getSession()
    {

        if (isset($_SESSION["username"])) {
            $user = DB::table('users')
                ->where(["username" => $_SESSION["username"]])
                ->get("userId");

            $fromUser = $user[0]->userId;
            $toUser = $_SESSION["toUser"];

            echo json_encode(['fromUser' => $fromUser, 'toUser' => $toUser, 'username' => $_SESSION["username"]]);
        } else {
            echo json_encode("");
        }
    }

    public function sendToUser()
    {
        if (isset($_POST["toUser"])) {
            if ($_POST["toUser"] !== "") {
                $_SESSION['toUser'] = $_POST["toUser"];
                print_r($_POST["toUser"]);
                $user = DB::table('users')
                    ->where(["userId" => $_POST["toUser"]])
                    ->get("username");
                $_SESSION['toUserName'] = [$_POST["toUser"] => $user[0]->username];
                // print_r($_SESSION['toUserName']);
            }
        }
    }

    public function searchUser()
    {
        $search = $_POST["search"];
        if (isset($search)) {
            $users = DB::table("users")
                ->where('username', 'like', '%' . $search . '%')
                ->where("username", "!=", $_SESSION["username"])
                ->get(["username", "userId"]);
            echo json_encode($users);
        }
    }

    public function addUser()
    {
        $newUser = $_POST["newUser"];

        if (isset($newUser)) {
            if ($newUser !== "") {

                $user = DB::table('users')
                    ->where(["username" => $_SESSION["username"]])
                    ->get("userId");

                $userId = $user[0]->userId;

                $bar = DB::table("messages")
                    ->where(['toUser' => $userId, 'fromUser' => $newUser])
                    ->get();

                $bar2 = DB::table("messages")
                    ->where(['fromUser' => $userId, 'toUser' => $newUser])
                    ->get();

                $taskbar1 = [];
                foreach ($bar as $key => $value) {
                    $taskbar1[$value->toUser] = $value->body;
                }

                $taskbar2 = [];
                foreach ($bar2 as $key => $value) {
                    $taskbar2[$value->fromUser] = $value->body;
                }

                $taskbar = array_merge($taskbar1, $taskbar2);

                if (count($taskbar) === 0) {
                    $msg = new Msg();
                    $msg->body = "";
                    $msg->fromUser = $userId;
                    $msg->toUser = $newUser;

                    $msg->save();

                    $users1 = DB::table("messages")
                        ->where('fromUser', "=", $userId)
                        ->get();

                    $user1 = [];
                    foreach ($users1 as $key => $value) {
                        $user1[$value->fromUser] = $value->body;
                    }

                    $users2 = DB::table("messages")
                        ->where('toUser', "=", $userId)
                        ->get();

                    $user2 = [];
                    foreach ($users2 as $key => $value) {
                        $user2[$value->toUser] = $value->body;
                    }

                    $userMerge = array_merge($user1, $user2);

                    $_SESSION['toUser'] = $newUser;
                    $user = DB::table('users')
                        ->where(["userId" => $newUser])
                        ->get("username");
                    $_SESSION['toUserName'] = [$newUser => $user[0]->username];

                    echo json_encode($userMerge);
                } else {
                    echo json_encode("");
                }
            }
        }
    }
}
